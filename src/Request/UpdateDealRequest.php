<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\Model\Deal;

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
     * @return array|Deal
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ServerErrorException
     */
    public function request()
    {
        return parent::request();
    }
}