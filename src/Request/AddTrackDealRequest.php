<?php

namespace Nalogka\DealsSDK\Request;

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
}