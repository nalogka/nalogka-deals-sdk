<?php


namespace Nalogka\DealsSDK\Exception;


class NalogkaSdkException extends \Exception
{
    public function __construct($message = "", \Exception $previous = null, $code = 0)
    {
        parent::__construct($message, $code, $previous);
    }
}