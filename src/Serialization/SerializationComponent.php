<?php

namespace Fostenslave\NalogkaDealsSDK\Serialization;

use Fostenslave\NalogkaDealsSDK\Errors\AccessDeniedError;
use Fostenslave\NalogkaDealsSDK\Errors\MalformedRequestError;
use Fostenslave\NalogkaDealsSDK\Errors\UnauthorizedError;
use Fostenslave\NalogkaDealsSDK\Errors\ItemValidationError;
use Fostenslave\NalogkaDealsSDK\Errors\NotFoundError;
use Fostenslave\NalogkaDealsSDK\Errors\ValidationError;
use Fostenslave\NalogkaDealsSDK\Errors\ServerError;
use Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException;
use Fostenslave\NalogkaDealsSDK\Model\AdditionalService;
use Fostenslave\NalogkaDealsSDK\Model\Attachment;
use Fostenslave\NalogkaDealsSDK\Model\CalculationResult;
use Fostenslave\NalogkaDealsSDK\Model\Deal;
use Fostenslave\NalogkaDealsSDK\Model\Deposit;
use Fostenslave\NalogkaDealsSDK\Model\DepositForm;
use Fostenslave\NalogkaDealsSDK\Model\FormData;
use Fostenslave\NalogkaDealsSDK\Model\Dispute;
use Fostenslave\NalogkaDealsSDK\Model\Transaction;
use Fostenslave\NalogkaDealsSDK\Model\SubjectItem;
use Fostenslave\NalogkaDealsSDK\Model\DealStatus;
use Fostenslave\NalogkaDealsSDK\Model\Requisite;
use Fostenslave\NalogkaDealsSDK\Model\TrackData;
use Fostenslave\NalogkaDealsSDK\Model\ContactInfo;
use Fostenslave\NalogkaDealsSDK\Model\DeliveryEvent;
use Fostenslave\NalogkaDealsSDK\Model\CreatedEvent;
use Fostenslave\NalogkaDealsSDK\Model\UpdatedEvent;
use Fostenslave\NalogkaDealsSDK\Model\StatusChangedEvent;

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
        'Transaction' => Transaction::class,
        'DealStatus' => DealStatus::class,
        'Requisite' => Requisite::class,
        'FormData' => FormData::class,
        'TrackData' => TrackData::class,
        'ContactInfo' => ContactInfo::class,

        'DeliveryEvent' => DeliveryEvent::class,
        'CreatedEvent' => CreatedEvent::class,
        'UpdatedEvent' => UpdatedEvent::class,
        'StatusChangedEvent' => StatusChangedEvent::class,

        'UnauthorizedError' => UnauthorizedError::class,
        'AccessDeniedError' => AccessDeniedError::class,
        'ItemValidationError' => ItemValidationError::class,
        'NotFoundError' => NotFoundError::class,
        'ValidationError' => ValidationError::class,
        'MalformedRequestError' => MalformedRequestError::class,
        'ServerError' => ServerError::class,
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
                return (object)$data;
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
                throw new NalogkaSdkException("Неправильная структура collection");
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

    function camelCaseToUnderScore($input)
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }

}