<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\Model\Deal;

class ListDealsRequest extends AbstractRequest
{
    public function page($page)
    {
        $this->requestData['page'] = $page;

        return $this;
    }

    public function items($items)
    {
        $this->requestData['items'] = $items;

        return $this;
    }

    public function filter($filter)
    {
        $this->requestData['filter'] = $filter;

        return $this;
    }

    protected function getHttpMethod()
    {
        return self::METHOD_GET;
    }

    protected function getHttpPath()
    {
        return "/deals/";
    }

    /**
     * @return Deal[]
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ServerErrorException
     */
    public function request()
    {
        return parent::request();
    }
}