<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

class GetPaymentFormRequest extends AbstractRequest
{
    private $id;

    public function id($id)
    {
        $this->id = $id;

        return $this;
    }

    public function requisiteId($id)
    {
        $this->requestData['requisite_id'] = $id;

        return $this;
    }

    public function profileId($id)
    {
        $this->requestData['profile_id'] = $id;

        return $this;
    }    

    public function successUrl($url)
    {
        $this->requestData['success_url'] = $url;

        return $this;
    }
    
    public function failUrl($url)
    {
        $this->requestData['fail_url'] = $url;

        return $this;
    }

    protected function getHttpMethod()
    {
        return self::METHOD_GET;
    }

    protected function getHttpPath()
    {
        return "/deals/{$this->id}/payment-form";
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