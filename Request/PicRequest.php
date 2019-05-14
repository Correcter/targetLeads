<?php

namespace Target\Request;

use GuzzleHttp\Client;
use Symfony\Component\Console\Exception\RuntimeException;

/**
 * Class PicRequest.
 *
 * @author Vitaly Dergunov <v.dergunov@icontext.ru>
 */
class PicRequest extends AbstractRequest
{
    /**
     * @var array
     */
    private $content = [];

    /**
     * @var null|string
     */
    private $secret;

    /**
     * @var null|string
     */
    private $source;

    /**
     * PicRequest constructor.
     *
     * @param array       $picLead
     * @param null|string $key
     * @param null|string $source
     */
    public function __construct(array $picLead = [], string $key = null, string $source = null)
    {
        parent::__construct();

        $this
            ->buildContent($picLead)
            ->buildSecret($key)
            ->buildSource($source);
    }

    /**
     * @param null|string $path
     *
     * @return \GuzzleHttp\Psr7\Response
     */
    public function sendLead(string $path = null)
    {
        $url = parse_url($path);
        $this->setRequstUri($url['path']);
        $this->setHttpMethod('POST');
        $this->addHeader('Content-Type', 'application/json; charset=utf-8');
        $this->setBody(
            \GuzzleHttp\json_encode([
                'content' => $this->content,
                'source' => $this->source,
                'secret' => $this->secret,
            ], JSON_UNESCAPED_UNICODE)
        );

        $this->guzzleClient = new Client([
            'base_uri' => $url['scheme'].'://'.$url['host'],
        ]);

        return $this->request();
    }

    /**
     * @param array $picLead
     *
     * @return PicRequest
     */
    private function buildContent(array $picLead = []): self
    {
        $this->content = $this->translateField($picLead);

        return $this;
    }

    /**
     * @param null|string $key
     *
     * @return PicRequest
     */
    private function buildSecret(string $key = null): self
    {
        $this->secret = hash_hmac(
            'md5',
            \GuzzleHttp\json_encode(
                $this->content,
                JSON_UNESCAPED_UNICODE
            ),
            $key
        );

        return $this;
    }

    /**
     * @param null|string $source
     *
     * @return PicRequest
     */
    private function buildSource(string $source = null): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @param array $picLead
     *
     * @return array
     */
    private function translateField(array $picLead = [])
    {
        $newPicLead = [];
        $transformFields = [
            'leadId' => 'id',
            'formName' => 'form_name',
            'userFullName' => 'full_name',
            'userEmail' => 'email',
            'userPhone' => 'phone',
        ];

        foreach ($picLead as $key => $leadVal) {
            if (!isset($transformFields[$key])) {
                throw new RuntimeException('Лид имеет невалидные поля', 0);
            }
            $newPicLead[$transformFields[$key]] = $leadVal;
        }

        return $newPicLead;
    }
}
