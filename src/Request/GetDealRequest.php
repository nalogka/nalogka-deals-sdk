<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\Model\Deal;

class GetDealRequest extends AbstractRequest
{
    private $id;

    public function id($id)
    {
        $this->id = $id;

        return $this;
    }

    protected function getHttpMethod()
    {
        return self::METHOD_GET;
    }

    protected function getHttpPath()
    {
        return "/deals/{$this->id}";
    }

    /**
     * @return array|null|object|Deal
     * @throws \Nalogka\DealsSDK\Exception\ApiErrorException
     * @throws \Nalogka\DealsSDK\Exception\NalogkaSdkException
     * @throws \Nalogka\DealsSDK\Exception\ServerErrorException
     */
    public function request()
    {
        return parent::request();
    }
}