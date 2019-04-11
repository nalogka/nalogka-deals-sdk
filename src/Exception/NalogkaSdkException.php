<?php


namespace Fostenslave\NalogkaDealsSDK\Exception;

/**
 * Исключение, выбрасываемое когда возникают ошибки в SDK.
 *
 * Например ошибки десереализации
 *
 * @package Fostenslave\NalogkaDealsSDK\Exception
 */
class NalogkaSdkException extends \Exception
{
    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}