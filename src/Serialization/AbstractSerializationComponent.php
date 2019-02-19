<?php


namespace Fostenslave\NalogkaDealsSDK\Serialization;

use Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException;

abstract class AbstractSerializationComponent
{
    /**
     * @param $data
     * @return object|array
     * @throws NalogkaSdkException
     */
    abstract public function deserialize($data);
}