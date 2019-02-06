<?php


namespace Nalogka\DealsSDK\Exception;


class ServerErrorException extends NalogkaSdkException
{
    public function __construct($code, $message = "", \Throwable $previous = null)
    {
        parent::__construct($message, $previous, $code);
    }
}