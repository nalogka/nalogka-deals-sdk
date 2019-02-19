<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\Model\Deal;

class DealEventsRequest extends AbstractRequest
{
    private $id;

    public function id($id)
    {
        $this->id = $id;

        return $this;
    }

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
        return "/deals/{$this->id}/events";
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