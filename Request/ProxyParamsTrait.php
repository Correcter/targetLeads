<?php

namespace Target\Request;

/**
 * Class ProxyParamsTrait.
 *
 * @author Vitaly Dergunov <correcter@inbox.ru>
 */
trait ProxyParamsTrait
{
    /**
     * @var string
     */
    protected $baseUri;

    /**
     * @var string
     */
    protected $agencyName;

    /**
     * @var string
     */
    protected $clientName;

    /**
     * @var string
     */
    protected $proxyToken;

    /**
     * @var string
     */
    protected $apiVer;

    /**
     * @return null|string
     */
    public function getApiVer(): ?string
    {
        return $this->apiVer;
    }

    /**
     * @param null|string $baseUri
     */
    protected function setBaseUri(string $baseUri = null)
    {
        $this->baseUri = $baseUri;
    }

    /**
     * @return null|string
     */
    protected function getBaseUri(): ?string
    {
        return $this->baseUri;
    }

    /**
     * @param null|string agencyName
     */
    protected function setAgencyName(string $agencyName = null)
    {
        $this->agencyName = $agencyName;
    }

    /**
     * @return null|string
     */
    protected function getAgencyName(): ?string
    {
        return $this->agencyName;
    }

    /**
     * @param null|string $clientName
     */
    protected function setClientName(string $clientName = null)
    {
        $this->clientName = $clientName;
    }

    /**
     * @return null|string
     */
    protected function getClientName(): ?string
    {
        return $this->clientName;
    }

    /**
     * @param null|string $apiVer
     */
    protected function setApiVer(string $apiVer = null)
    {
        $this->apiVer = $apiVer;
    }

    /**
     * @param null|string $proxyToken
     */
    protected function setProxyToken(string $proxyToken = null)
    {
        $this->proxyToken = $proxyToken;
    }

    /**
     * @return null|string
     */
    protected function getProxyToken(): ?string
    {
        return $this->proxyToken;
    }
}
