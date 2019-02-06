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
    

    public function __construct($baseUrl, $parameters = [], $serializationComponent = null)
    {
        $this->baseUrl = $baseUrl;

        $this->parameters = $parameters;

        $this->serializationComponent = $serializationComponent;
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
            $url .= "?" . http_build_query($data) . "&trace=explsdk";
        } else {
            $url .= "?trace=explsdk";
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

        $result = curl_exec($ch);

        $responseInfo = curl_getinfo($ch);

        // if (!in_array((int)$responseInfo['http_code'], [200, 201, 202, 203, 204, 205, 206, 207, 208, 226])) {
        //     throw new ServerErrorException($responseInfo['http_code'], $result);
        // }

        if ($result === "") {
            return null;
        }

        $array = json_decode($result, true);

        if (!$this->serializationComponent) {
            throw new NalogkaSdkException("Не указан компонент сериализации");
        }

        $object = $this->serializationComponent->deserialize($array);

        if ($object instanceof AbstractError) {
            throw new ApiErrorException($object);
        }

        return $object;
    }
}