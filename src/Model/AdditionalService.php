<?php


namespace Fostenslave\NalogkaDealsSDK\Model;


class AdditionalService
{
    const PAYER_BUYER = 'buyer';
    const PAYER_SELLER = 'seller';
    const PAYER_5050 = '50/50';

    const PROVIDED_BY_SELLER = 'seller';
    const PROVIDED_BY_NALOGKA = 'nalogka';

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