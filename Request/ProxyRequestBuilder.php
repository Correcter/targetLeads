<?php

namespace Target\Request;

use GuzzleHttp\Client;

/**
 * Class RequestBuilder.
 *
 * @author Vitaly Dergunov <v.dergunov@icontext.ru>
 */
class ProxyRequestBuilder extends AbstractRequest
{
    use ProxyParamsTrait;

    /**
     * @const string
     */
    const PROXY_PATH = 'https://target-proxy.icontext.ru/';

    /**
     * RequestBuilder constructor.
     *
     * @param array $requestParams
     */
    public function __construct(array $requestParams = [])
    {
        parent::__construct();

        $requestParams = array_merge(
            [
                'base_path' => static::PROXY_PATH,
                'api' => '',
                'client_name' => '',
                'agency_name' => '',
                'proxy_token' => '',
            ],
            $requestParams
        );

        $this->setBaseUri($requestParams['base_path']);
        $this->setClientName($requestParams['client_name']);
        $this->setAgencyName($requestParams['agency_name']);
        $this->setApiVer($requestParams['api']);
        $this->setProxyToken($requestParams['proxy_token']);

        $this->guzzleClient = new Client([
            'base_uri' => $requestParams['base_path'],
        ]);
    }

    /**
     * @return $this
     */
    public function auth()
    {
        if ($this->getAgencyName() && $this->getProxyToken()) {
            if ($this->getClientName()) {
                $this->addHeader('X-TARGET-CLIENT', $this->getClientName());
            }

            $this->addHeader('X-TARGET-AGENCY', $this->getAgencyName());
            $this->addHeader('X-AUTH-TOKEN', $this->getProxyToken());
        }

        return $this;
    }
}
