<?php


namespace Nalogka\DealsSDK\Errors;


class ValidationError extends AbstractError
{
    /**
     * @var ItemValidationError[]
     */
    public $errors;
}