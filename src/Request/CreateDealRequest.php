<?php


namespace Nalogka\DealsSDK\Request;


use Nalogka\DealsSDK\Exception\ApiErrorException;
use Nalogka\DealsSDK\Exception\NalogkaSdkException;
use Nalogka\DealsSDK\Model\Deal;

class CreateDealRequest extends AbstractRequest
{
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
            'payer' => $payer,
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

    protected function getHttpMethod()
    {
        return self::METHOD_POST;
    }

    protected function getHttpPath()
    {
        return "/deals/";
    }

    /**
     * @return array|object|Deal
     * @throws ApiErrorException
     * @throws NalogkaSdkException
     */
    public function request()
    {
        return parent::request();
    }
}