<?php

namespace Nalogka\DealsSDK\Exception;

use Nalogka\DealsSDK\Errors\AbstractError;

class ApiErrorException extends NalogkaSdkException
{
    private $error;

    public function __construct($error)
    {
        parent::__construct("");

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