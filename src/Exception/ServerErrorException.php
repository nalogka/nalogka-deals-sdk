<?php


namespace Nalogka\DealsSDK\Exception;


class ServerErrorException extends NalogkaSdkException
{
    public function __construct($code, $message = "", \Exception $previous = null)
    {
        parent::__construct($message, $previous, $code);
    }
}