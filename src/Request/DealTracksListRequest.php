<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\Model\TrackData;

class DealTracksListRequest extends AbstractRequest
{
	private $id;

	public function id($id)
	{
		$this->id = $id;

		return $this;
	}

    public function page($page)
    {
        $this->requestData['page'] = $page;

        return $this;
    }

    public function items($items)
    {
        $this->requestData['items'] = $items;

        return $this;
    }


    protected function getHttpMethod()
    {
        return self::METHOD_GET;
    }

    protected function getHttpPath()
    {
        return "/deals/{$this->id}/tracks";
    }

    /**
     * @return TrackData[]
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ServerErrorException
     */
    public function request()
    {
        return parent::request();
    }
}