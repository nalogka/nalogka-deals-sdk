<?php


namespace Nalogka\DealsSDK\Model;


class Dispute
{
    /**
     * @var \DateTime Момент создания спора */
    public $createdAt;

    /** @var \DateTime Момент последнего обновления спора */
    public $updatedAt;

    /** @var string Статус спора  */
    public $status;

    /** @var \DateTime Момент последнего обновления статуса спора  */
    public $statusUpdatedAt;

    /** @var string Сторона, инициировавшая спор  */
    public $initiatedBy;

    /** @var Attachment[]  */
    public $attachments = [];

    /** @var string Виновная сторона */
    public $guiltySide;

    /** @var string Способ урегулирования спора */
    public $settlementDescription;

    /** @var string Причина возникновения спора  */
    public $reason;
}