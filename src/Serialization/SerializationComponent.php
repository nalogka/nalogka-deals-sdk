<?php


namespace Nalogka\DealsSDK\Serialization;

use Nalogka\DealsSDK\Errors\AccessDeniedError;
use Nalogka\DealsSDK\Errors\ItemValidationError;
use Nalogka\DealsSDK\Errors\NotFoundError;
use Nalogka\DealsSDK\Errors\ValidationError;
use Nalogka\DealsSDK\Exception\NalogkaSdkException;
use Nalogka\DealsSDK\Model\AdditionalService;
use Nalogka\DealsSDK\Model\Attachment;
use Nalogka\DealsSDK\Model\CalculationResult;
use Nalogka\DealsSDK\Model\Deal;
use Nalogka\DealsSDK\Model\Deposit;
use Nalogka\DealsSDK\Model\DepositForm;
use Nalogka\DealsSDK\Model\Dispute;
use Nalogka\DealsSDK\Model\Payment;
use Nalogka\DealsSDK\Model\SubjectItem;
use Nalogka\DealsSDK\Model\DealStatus;

class SerializationComponent extends AbstractSerializationComponent
{
    private $dataMapping = [
        'AdditionalService' => AdditionalService::class,
        'Attachment' => Attachment::class,
        'CalculationResult' => CalculationResult::class,
        'Deal' => Deal::class,
        'DepositForm' => DepositForm::class,
        'Dispute' => Dispute::class,
        'SubjectItem' => SubjectItem::class,
        'Deposit' => Deposit::class,
        'Payment' => Payment::class,
        'DealStatus' => DealStatus::class,

        'AccessDeniedError' => AccessDeniedError::class,
        'ItemValidationError' => ItemValidationError::class,
        'NotFoundError' => NotFoundError::class,
        'ValidationError' => ValidationError::class,
    ];

    /**
     * @param $data
     * @return object|array
     * @throws NalogkaSdkException
     */
    public function deserialize($data)
    {
        if (empty($data)) {
            return $data;
        }

        if (!isset($data['~type'])) {
            try {
                return $this->deserializeCollection($data);
            } catch (\Exception $exception) {
                throw new NalogkaSdkException("Не найдено поле type в структуре", $exception);
            }
        }

        $type = $data['~type'];

        if ($type === 'Collection') {
            return $this->deserializeCollection($data);
        }

        return $this->deserializeObject($data);
    }

    /**
     * @param $collectionData
     * @return array
     * @throws NalogkaSdkException
     */
    public function deserializeCollection($collectionData)
    {
        if (!isset($collectionData['collection'])) {
            if (isset($collectionData[0])) {
                $collectionElements = $collectionData;
            } else {
                throw new NalogkaSdkException("Не правильная структура collection");
            }
        } else {
            $collectionElements = $collectionData['collection'];
        }

        $collectionOfObjects = [];

        foreach ($collectionElements as $collectionElement) {
            $collectionOfObjects[] = $this->deserialize($collectionElement);
        }

        return $collectionOfObjects;
    }

    /**
     * @param $data
     * @return object
     * @throws NalogkaSdkException
     */
    public function deserializeObject($data)
    {
        if (!isset($data['~type'])) {
            throw new NalogkaSdkException("Не найдено поле type в структуре");
        }

        $type = $data['~type'];
        unset($data['~type']);

        if (!isset($this->dataMapping[$type])) {
            throw new NalogkaSdkException("Не найден тип {$type}");
        }

        if (isset($data['~id'])) {
            $data['id'] = $data['~id'];
            unset($data['~id']);
        }

        $object = new $this->dataMapping[$type];

        foreach ($data as $key => $value) {
            $result = $value;
            if (is_array($value)) {
                $result = $this->deserialize($value);
            }

            $propertyName = $this->underScoreToCamelCase($key);

            $object->$propertyName = $result;
        }

        return $object;
    }

    public function underScoreToCamelCase($string)
    {
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));

        $str[0] = strtolower($str[0]);

        return $str;
    }

    function camelCaseToUnderScore($input) {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }

}