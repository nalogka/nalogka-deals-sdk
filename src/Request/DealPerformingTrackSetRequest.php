<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\Model\TrackData;

class DealPerformingTrackSetRequest extends AbstractRequest
{
    private $id;
    private $initiatorProfileId;

    public function id($id)
    {
        $this->id = $id;

        return $this;
    }

    public function initiatorProfileId($initiatorProfileId)
    {
        $this->initiatorProfileId = $initiatorProfileId;

        return $this;
    }

    public function trackerShortName($trackerShortName)
    {
        $this->requestData['tracker_short_name'] = $trackerShortName;

        return $this;
    }

    public function code($code)
    {
        $this->requestData['code'] = $code;

        return $this;
    }

    protected function getHttpMethod()
    {
        return self::METHOD_PUT;
    }

    protected function getHttpPath()
    {
        if ($this->initiatorProfileId) {
            return "/deals/{$this->id}/performing-track?initiator_profile_id=" . $this->initiatorProfileId;
        }

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