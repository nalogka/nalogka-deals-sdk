<?php


namespace Fostenslave\NalogkaDealsSDK\Model;


class SubjectItem
{
    /**@var string Артикул */
    public $sku;
    /** @var string Наименование товара */
    public $name;
    /**@var string Описание товара*/
    public $description;
    /** @var float Цена товара */
    public $price;
    /** @var integer Количество товаров */
    public $quantity = 1;
}