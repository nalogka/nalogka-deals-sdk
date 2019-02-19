<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

class ListDepositRequisites extends AbstractRequest
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
}