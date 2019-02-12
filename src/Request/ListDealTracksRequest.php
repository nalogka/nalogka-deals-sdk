<?php

namespace Nalogka\DealsSDK\Request;

class ListDealTracksRequest extends AbstractRequest
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
}