<?php


namespace Fostenslave\NalogkaDealsSDK\Model;


class CalculationResult
{
    /** @var float Стоимость товаров, руб */
    public $subjectItemsSum = 0;

    /** @var float Сумма услуг продавца, оказанных покупателю, руб */
    public $sellerProvidedSum = 0;

    /** @var float Сумма услуг сервиса (Наложки), оказанных продавцу, руб */
    public $sellerConsumedSum = 0;

    /** @var float Сумма услуг сервиса (Наложки), оказанных покупателю, руб */
    public $buyerConsumedSum = 0;

    /** @var string Сторона сделки, оплачивающая комиссию (константы PAYER_*) */
    public $commissionPayer;

    /** @var float Сумма комиссии, руб */
    public $commissionSum;

    /** @var float Часть комиссии, оплачиваемая продавцом, руб */
    public $commissionSellerSum;

    /** @var float Часть комиссии, оплачиваемая покупателем, руб */
    public $commissionBuyerSum;

    /** @var float Расходы покупателя (стоимость товаров и оплачиваемых им услуг), руб */
    public $buyerExpenses = 0;

    /** @var float Расходы продавца (стоимость оплачиваемых им услуг), руб */
    public $sellerExpenses = 0;

    /** @var float Сумма, которую покупатель должен внести онлайн, руб */
    public $buyerHaveToPayOnline = 0;

    /** @var float Сумма, которую покупатель должен внести офлайн, руб */
    public $buyerHaveToPayOffline = 0;

    /** @var float Сумма, которую продавец должен внести онлайн, руб */
    public $sellerHaveToPayOnline = 0;

    /** @var float Сумма выплаты продавцу в случае успешного завершения сделки, руб */
    public $payout = 0;

    /** @var float Выгода продавца (выплата, уменьшенная на расходы продавца), руб */
    public $sellerProfit = 0;
}