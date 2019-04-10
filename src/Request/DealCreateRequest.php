<?php

namespace Fostenslave\NalogkaDealsSDK\Request;

use Fostenslave\NalogkaDealsSDK\Model\Deal;

class DealCreateRequest extends AbstractRequest
{
    public $initiatorProfileId;

    public function initiatorProfileId($initiatorProfileId)
    {
        $this->initiatorProfileId = $initiatorProfileId;

        return $this;
    }

    public function orderId($orderId)
    {
        $this->requestData['order_id'] = $orderId;

        return $this;
    }

    public function conditions($conditions)
    {
        $this->requestData['conditions'] = $conditions;

        return $this;
    }

    public function buyerProfileId($buyerProfileId)
    {
        $this->requestData['buyer_profile_id'] = $buyerProfileId;

        return $this;
    }

    public function sellerProfileId($sellerProfileId)
    {
        $this->requestData['seller_profile_id'] = $sellerProfileId;

        return $this;
    }

    public function attachment($id, $description)
    {
        $this->requestData['attachments'][] = [
            'id' => $id,
            'description' => $description
        ];

        return $this;
    }

    public function commissionPayer($commissionPayer)
    {
        $this->requestData['commission_payer'] = $commissionPayer;

        return $this;
    }

    public function buyerHaveToPayOffline($buyerHaveToPayOffline)
    {
        $this->requestData['buyer_have_to_pay_offline'] = $buyerHaveToPayOffline;

        return $this;
    }

    public function subjectItem($name, $price, $quantity, $description = '', $sku = '')
    {
        $this->requestData['subject_items'][] = [
            'sku' => $sku,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'quantity' => $quantity
        ];

        return $this;
    }

    public function additionalService($name, $description, $originalCost, $finalCost, $payer, $providedBy)
    {
        $this->requestData['additional_services'][] = [
            'name' => $name,
            'description' => $description,
            'original_cost' => $originalCost,
            'final_cost' => $finalCost,
            'counterActor' => $payer,
            'provided_by' => $providedBy
        ];

        return $this;
    }

    public function partialBuyoutAllowed()
    {
        $this->requestData['partial_buyout_allowed'] = true;

        return $this;
    }

    public function partialBuyoutNotAllowed()
    {
        $this->requestData['partial_buyout_allowed'] = false;

        return $this;
    }

    public function payoutRequisiteId($payoutRequisiteId)
    {
        $this->requestData['payout_requisite_id'] = $payoutRequisiteId;

        return $this;
    }

    protected function getHttpMethod()
    {
        return self::METHOD_POST;
    }

    protected function getHttpPath()
    {
        if ($this->initiatorProfileId) {
            return "/deals/?initiator_profile_id=" . $this->initiatorProfileId;
        }

        return "/deals/";
    }

    /**
     * @return array|Deal
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException
     * @throws \Fostenslave\NalogkaDealsSDK\Exception\ServerErrorException
     */
    public function request()
    {
        return parent::request();
    }
}