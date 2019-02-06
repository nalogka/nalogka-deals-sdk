<?php


namespace Nalogka\DealsSDK\Request;


class DealStatusesRequest extends AbstractRequest
{


    protected function getHttpMethod()
    {
        return self::METHOD_GET;
    }

    protected function getHttpPath()
    {
        return "/deals/statuses";
    }

    public function request()
    {
        return parent::request();
    }
}