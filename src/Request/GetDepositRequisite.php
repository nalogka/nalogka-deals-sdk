<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\Model\Requisite;

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

    /**
     * @return array|Requisite
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ServerErrorException
     */
    public function request()
    {
        return parent::request();
    }
}