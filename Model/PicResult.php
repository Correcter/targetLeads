<?php

namespace Target\Model;

/**
 * Description of PicResult.
 *
 * @author Vitaly Dergunov <v.dergunov@icontext.ru>
 */
class PicResult
{
    /**
     * @var null|string
     */
    private $result;

    /**
     * @var null|string
     */
    private $error;

    /**
     * @var null|array
     */
    private $content;

    /**
     * LeadInfo constructor.
     *
     * @param array $mapData
     */
    public function __construct(array $mapData = [])
    {
        foreach ($mapData as $key => $val) {
            $key = lcfirst(str_replace('_', '', ucwords($key, '_')));
            if (property_exists(__CLASS__, $key)) {
                $this->{$key} = $val;
            }
        }
    }

    /**
     * @return null|string
     */
    public function getResult(): ?string
    {
        return $this->result;
    }

    /**
     * @param null|string $result
     *
     * @return PicResult
     */
    public function setResult(string $result = null): self
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * @param null|string $error
     *
     * @return PicResult
     */
    public function setError(string $error = null): self
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @return null|array
     */
    public function getContent(): ?array
    {
        return $this->content;
    }

    /**
     * @param null|array $content
     *
     * @return PicResult
     */
    public function setContent(array $content = []): self
    {
        $this->content = $content;

        return $this;
    }
}
