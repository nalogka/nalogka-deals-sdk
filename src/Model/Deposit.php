<?php


namespace Fostenslave\NalogkaDealsSDK\Model;


class Deposit
{
    public $orderId;

    public $status;

    public $commissionPayer;

    public $subjectItemsSum;

    public $sellerProvidedSum;

    public $sellerConsumedSum;

    public $buyerConsumedSum;

    public $commissionSum;

    public $commissionSellerSum;

    public $commissionBuyerSum;

    public $payoutRequisiteId;

    /**
     * @var Transaction[]
     */
    public $payments = [];

    public $buyout;

    public $buyerExpenses;

    public $buyerPaid;

    public $buyerHaveToPayOnline;

    public $buyerHaveToPayOffline;

    public $return;

    public $sellerExpenses;

    public $sellerPaid;

    public $sellerHaveToPayOnline;

    public $payout;

    public $sellerProfit;

    public $createdAt;

    public $updatedAt;
}