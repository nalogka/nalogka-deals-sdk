<?php


namespace Fostenslave\NalogkaDealsSDK\Model;


class FormData
{
    /**
     * @var string HTTP-метод отправки формы
     */
    public $method;
    /**
     * @var string URL отправки формы
     */
    public $url;
    /**
     * @var array Параметры формы и их значения
     */
    public $parameters;
}