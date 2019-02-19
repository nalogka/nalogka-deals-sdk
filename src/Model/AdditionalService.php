<?php


namespace Fostenslave\NalogkaDealsSDK\Model;


class AdditionalService
{
    /** @var string Наименование сервиса */
    public $name;

    /** @var string Описание сервиса */
    public $description;

    /** @var float Стоимость услуги без учёта скидок */
    public $originalCost;

    /** @var float Стоимость услуги с учётом всех скидок */
    public $finalCost;

    /** @var string */
    public $payer;

    /** @var string */
    public $providedBy;
}