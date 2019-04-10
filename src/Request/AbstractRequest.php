<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\ApiClient;

abstract class AbstractRequest
{
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PATCH = 'PATCH';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    public $requestData = [];

    /**
     * @var ApiClient
     */
    private $apiClient;

    function __construct($apiClient)
    {
        $this->apiClient = $apiClient;
    }

    abstract protected function getHttpMethod();

    abstract protected function getHttpPath();

    /**
     * @return array|object|null
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ServerErrorException
     */
    public function request()
    {
        return $this->apiClient->request($this->getHttpMethod(), $this->getHttpPath(), $this->requestData);
    }
}