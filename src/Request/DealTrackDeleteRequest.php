<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

class DealTrackDeleteRequest extends AbstractRequest
{
    private $id;
    private $initiatorProfileId;
    private $trackCode;

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

    public function trackCode($trackCode)
    {
        $this->trackCode = $trackCode;

        return $this;
    }

    protected function getHttpMethod()
    {
        return self::METHOD_DELETE;
    }

    protected function getHttpPath()
    {
        if ($this->initiatorProfileId) {
            return "/deals/{$this->id}/tracks/{$this->trackCode}?initiator_profile_id=" . $this->initiatorProfileId;
        }

        return "/deals/{$this->id}/tracks/{$this->trackCode}";
    }

    /**
     * @return null
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ServerErrorException
     */
    public function request()
    {
        return parent::request();
    }
}