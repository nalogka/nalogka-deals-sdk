<?php


namespace Fostenslave\NalogkaDealsSDK\Request;


use Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException;
use Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException;
use Fostenslave\NalogkaDealsSDK\Model\Deal;

class CalculateDealRequest extends AbstractRequest
{


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

    public function subjectItem($name, $price, $quantity, $sku)
    {
        $this->requestData['subject_items'][] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'sku' => $sku,
        ];

        return $this;
    }

    public function additionalService($name, $providedBy, $payer = "", $originalCost = "", $finalCost = "")
    {
        $this->requestData['additional_services'][] = [
            'name' => $name,
            'provided_by' => $providedBy,
            'payer' => $payer,
            'original_cost' => $originalCost,
            'final_cost' => $finalCost,
        ];

        return $this;
    }

    protected function getHttpMethod()
    {
        return self::METHOD_GET;
    }

    protected function getHttpPath()
    {
        return "/deals/calculate";
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