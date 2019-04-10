<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\Model\Requisite;

class RequisiteListRequest extends AbstractRequest
{

    private $ownerId;

    public function ownerId($id)
    {
        $this->ownerId = $id;

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


    protected function getHttpMethod()
    {
        return self::METHOD_GET;
    }

    protected function getHttpPath()
    {
        return "/deposit/requisites/{$this->ownerId}";
    }

    /**
     * @return Requisite[]
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ServerErrorException
     */
    public function request()
    {
        return parent::request();
    }
}