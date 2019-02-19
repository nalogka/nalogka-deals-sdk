<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

class GetDepositRequisite extends AbstractRequest
{

    private $ownerId;
    private $id;

    public function ownerId($id)
    {
        $this->ownerId = $id;

        return $this;
    }

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
        return "/deposit/requisites/{$this->ownerId}/{$this->id}";
    }
}