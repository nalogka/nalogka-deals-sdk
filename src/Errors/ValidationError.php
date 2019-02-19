<?php


namespace Fostenslave\NalogkaDealsSDK\Errors;


class ValidationError extends AbstractError
{
    /**
     * @var ItemValidationError[]
     */
    public $errors;
}