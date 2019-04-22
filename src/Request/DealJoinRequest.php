<?php


namespace Fostenslave\NalogkaDealsSDK\Request;


class DealJoinRequest extends AbstractRequest
{
    const SIDE_BUYER = "buyer";
    const SIDE_SELLER = "seller";

    private $id;
    private $initiatorProfileId;

    public $requestData = [
        'replace' => false
    ];

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

    public function side($side)
    {
        $this->requestData['side'] = $side;

        return $this;
    }

    public function profileId($profileId)
    {
        $this->requestData['profile_id'] = $profileId;

        return $this;
    }

    public function replace()
    {
        $this->requestData['replace'] = true;

        return $this;
    }

    public function notReplace()
    {
        $this->requestData['replace'] = false;

        return $this;
    }

    protected function getHttpMethod()
    {
        return self::METHOD_POST;
    }

    protected function getHttpPath()
    {
        if ($this->initiatorProfileId) {
            return "/deals/{$this->id}/join?initiator_profile_id=" . $this->initiatorProfileId;
        }

        return "/deals/{$this->id}/join";
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