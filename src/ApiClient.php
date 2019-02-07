<?php

namespace Nalogka\DealsSDK;

use Nalogka\DealsSDK\Errors\AbstractError;
use Nalogka\DealsSDK\Exception\ApiErrorException;
use Nalogka\DealsSDK\Exception\NalogkaSdkException;
use Nalogka\DealsSDK\Exception\ServerErrorException;
use Nalogka\DealsSDK\Serialization\AbstractSerializationComponent;

class ApiClient
{
    private $baseUrl;

    private $parameters;

    /**
     * @var AbstractSerializationComponent
     */
    private $serializationComponent;


    private  $logger;
    

    public function __construct($baseUrl, $parameters = [], $serializationComponent)
    {
        $this->baseUrl = $baseUrl;

        $this->parameters = $parameters;

        $this->serializationComponent = $serializationComponent;
    }

    public  function setLogger(Log $logger){
        $this->logger = $logger;
    }

    private function logRequest($requestData, $response, $responseInfo){
        $this->logger->write('Отправляемые данные:');
        $this->logger->write($requestData);
        $this->logger->write('Ответ от сервера:');
        $this->logger->write($response);
        $this->logger->write('Curlinfo:');
        $this->logger->write($responseInfo);
    }

    /**
     * @param $method
     * @param $path
     * @param array $data
     * @return array|null|object
     * @throws NalogkaSdkException
     * @throws ApiErrorException
     * @throws ServerErrorException
     */
    public function request($method, $path, $data = [])
    {
        $method = strtoupper($method);

        $headers = isset($this->parameters['headers']) ? $this->parameters['headers'] : [];

        $url = rtrim($this->baseUrl, '/') . '/' . ltrim($path, '/');

        if ($method === "GET" && $data) {
            $url .= "?" . http_build_query($data);
        }

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($method !== "GET") {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            if ($data) {
                $data_string = json_encode($data);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                $headers['Content-Type'] = 'application/json';
                $headers['Content-Length'] = strlen($data_string);
            }
        }

        $curlReadyHeaders = [];
        foreach ($headers as $headerName => $headerValue) {
            $curlReadyHeaders[] = "{$headerName}: {$headerValue}";
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $curlReadyHeaders);

        $rawResponse = curl_exec($ch);

        $responseInfo = curl_getinfo($ch);

        if ($this->logger instanceof Log){
            $this->logRequest($data, $rawResponse, $responseInfo);
        }

        if (!$rawResponse && $this->isErrorResponse($responseInfo['http_code'])) {
            throw new ServerErrorException($responseInfo['http_code'], "Не удалось получить ответ от сервера. HTTP код: {$responseInfo['http_code']}");
        }

        $decodedResponse = json_decode($rawResponse, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new ServerErrorException($responseInfo['http_code'], $rawResponse);
        }

        $deserializedResponse = $this->serializationComponent->deserialize($decodedResponse);

        if ($deserializedResponse instanceof AbstractError) {
            throw new ApiErrorException($deserializedResponse);
        }

        return $deserializedResponse;
    }

    private function isErrorResponse($httpCode)
    {
        if (!in_array($httpCode, [200, 201, 202, 203, 204, 205, 206, 207, 208, 226])) {
            return true;
        }

        return false;
    }
}