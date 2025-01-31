<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\Model\TrackData;

class DealPerformingTrackGetRequest extends AbstractRequest
{
    private $id;

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
        return "/deals/{$this->id}/performing-track";
    }

    /**
     * @return array|TrackData
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ServerErrorException
     */
    public function request()
    {
        return parent::request();
    }
}