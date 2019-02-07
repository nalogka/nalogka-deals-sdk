<?php


namespace Nalogka\DealsSDK\Request;


use Nalogka\DealsSDK\Exception\ApiErrorException;
use Nalogka\DealsSDK\Exception\NalogkaSdkException;
use Nalogka\DealsSDK\Model\Deal;
use Nalogka\DealsSDK\Request\CreateDealRequest;

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