<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\Model\Deal;

class PerformingStartDealRequest extends AbstractRequest
{
    private $id;

    public function id($id)
    {
        $this->id = $id;

        return $this;
    }

    protected function getHttpMethod()
    {
        return self::METHOD_POST;
    }

    protected function getHttpPath()
    {
        return "/deals/{$this->id}/performing-start";
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