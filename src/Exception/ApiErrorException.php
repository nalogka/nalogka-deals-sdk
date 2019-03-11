<?php

namespace Fostenslave\NalogkaDealsSDK\Exception;

use Fostenslave\NalogkaDealsSDK\Errors\AbstractError;

class ApiErrorException extends NalogkaSdkException
{
    private $error;

    public function __construct($error = "", $code = 0)
    {
        parent::__construct("", $code);

        $this->error = $error;
    }

    /**
     * @return AbstractError
     */
    public function getError()
    {
        return $this->error;
    }
}