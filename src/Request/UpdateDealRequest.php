<?php


namespace Fostenslave\NalogkaDealsSDK\Request;


use Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException;
use Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException;
use Fostenslave\NalogkaDealsSDK\Model\Deal;
use Fostenslave\NalogkaDealsSDK\Request\CreateDealRequest;

class UpdateDealRequest extends CreateDealRequest
{
    private $id;

    public function id($id)
    {
        $this->id = $id;
        return $this;
    }

    protected function getHttpMethod()
    {
        return self::METHOD_PATCH;
    }

    protected function getHttpPath()
    {
        return "/deals/{$this->id}";
    }

    /**
     * @return array|object|Deal
     * @throws ApiErrorException
     * @throws NalogkaSdkException
     */
    public function request()
    {
        return parent::request();
    }
}