<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\Model\Track;

class AddTrackDealRequest extends AbstractRequest
{
    private $id;

    public function id($id)
    {
        $this->id = $id;

        return $this;
    }

    public function trackerId($trackerId)
    {
        $this->requestData['tracker_id'] = $trackerId;

        return $this;
    }

    public function trackingId($trackingId)
    {
        $this->requestData['tracking_id'] = $trackingId;

        return $this;
    }

    protected function getHttpMethod()
    {
        return self::METHOD_POST;
    }

    protected function getHttpPath()
    {
        return "/deals/{$this->id}/tracks";
    }

    /**
     * @return array|Track
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ServerErrorException
     */
    public function request()
    {
        return parent::request();
    }
}