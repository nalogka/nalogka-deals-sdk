<?php

namespace Nalogka\DealsSDK\Request;

class ListDealsRequest extends AbstractRequest
{
    public function page($page)
    {
        $this->requestData['page'] = $page;

        return $this;
    }

    public function limit($limit)
    {
        $this->requestData['limit'] = $limit;

        return $this;
    }

    public function filter($filter)
    {
        $this->requestData['filter'] = $filter;

        return $this;
    }

    protected function getHttpMethod()
    {
        return self::METHOD_GET;
    }

    protected function getHttpPath()
    {
        return "/deals";
    }
}