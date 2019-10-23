<?php


namespace Fostenslave\NalogkaDealsSDK\Model;


class Deal
{
    const COMMISSION_PAYER_BUYER = 'buyer';
    const COMMISSION_PAYER_SELLER = 'seller';
    const COMMISSION_PAYER_5050 = '50/50';

    /**
     * @var string Идентификатор сделки
     */
    public $id;

    /**
     * @var string Момент создания сделки
     */
    public $createdAt;

    /**
     * @var string Момент последнего обновления сделки
     */
    public $updatedAt;

    /**
     * @var string Идентификатор площадки, на которой создана сделка
     */
    public $marketplaceId;

    /**
     * @var string Статус сделки
     */
    public $status;

    /**
     * @var string Момент последнего обновления статуса
     */
    public $statusUpdatedAt;

    /**
     * @var string Важные условия сделки
     */
    public $conditions;

    /**
     * @var integer Покупатель
     */
    public $buyerProfileId;

    /**
     * @var integer Продавец
     */
    public $sellerProfileId;

    /**
     * @var string Сторона подтвердившая сделку. Возможные значения: none, seller, buyer, both. В настоящем классе определены соответствующие константы.
     */
    public $confirmedBy;

    /**
     * @var Deposit Данные депозита
     */
    public $deposit;

    /**
     * @var CalculationResult Данные калькуляции депозита
     */
    public $calculationResult;

    /**
     * @var string Уникальный строковой идентификатор сделки
     */
    public $token;

    /**
     * @var float Сумма всех товаров в сделке
     */
    public $subjectItemsTotal;

    /**
     * @var AdditionalService[] Дополнительные услуги сделки
     */
    public $additionalServices = [];

    /**
     * @var Attachment[] Вложения сделки
     */
    public $attachments = [];

    /**
     * @var string Плательщик комиссии сервиса
     */
    public $commissionPayer;

    /**
     * @var float Сколько покупатель заплатит оффлайн
     */
    public $buyerHaveToPayOffline;

    /**
     * @var SubjectItem[] Позиции сделки
     */
    public $subjectItems = [];

    /**
     * @var Dispute спор в сделке
     */
    public $dispute = null;

    /**
     * @var bool Разрешен ли продавцом частичный выкуп товара
     */
    public $partialBuyoutAllowed;

    /**
     * @var string Идентификатор заказа во внешней системе
     */
    public $orderId;

    /**
     * @var string Строковый идентификатор API пользователя, создавшего сделку
     */
    public $createdByApiUser;
}