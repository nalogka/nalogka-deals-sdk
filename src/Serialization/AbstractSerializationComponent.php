<?php


namespace Nalogka\DealsSDK\Serialization;

use Nalogka\DealsSDK\Exception\NalogkaSdkException;

abstract class AbstractSerializationComponent
{
    /**
     * @param $data
     * @return object|array
     * @throws NalogkaSdkException
     */
    abstract public function deserialize($data);
}