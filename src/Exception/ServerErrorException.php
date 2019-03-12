<?php


namespace Fostenslave\NalogkaDealsSDK\Exception;


class ServerErrorException extends NalogkaSdkException
{
    public function __construct($code, $message = "", \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}