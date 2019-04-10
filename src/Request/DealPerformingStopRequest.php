<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\Model\Deal;

class DealPerformingStopRequest extends AbstractRequest
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

    protected function getHttpMethod()
    {
        return self::METHOD_POST;
    }

    protected function getHttpPath()
    {
        if ($this->initiatorProfileId) {
            return "/deals/{$this->id}/performing-stop?initiator_profile_id=" . $this->initiatorProfileId;
        }

        return "/deals/{$this->id}/performing-stop";
    }

    /**
     * @return array|Deal
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ServerErrorException
     */
    public function request()
    {
        return parent::request();
    }
}