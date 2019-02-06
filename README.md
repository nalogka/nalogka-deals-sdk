# Пример реализации SDK для работы с API Безопасных сделок Наложка.рф

Пример реализован на языке php

## Использование

### Инициализация api-клиента и компонента сериализатора

```php
$serializationComponent = new SerializationComponent();

$apiClient = new ApiClient("https://sandbox.deals.api.nalogka.ru/", [
    'headers' => [
        'X-Nalogka-Auth-Token' => '9qASPlstioSjksdqpLkSF2js8Iks1CIv'
    ],
], $serializationComponent);
```

### Запрос списка сделок

```php
$listDealsRequest = (new ListDealsRequest($apiClient))
    ->page(1)
    ->limit(3);

try {
    $deals = $listDealsRequest->request();
} catch (ApiErrorException $e) {
    // Отшибка от API
} catch (ServerErrorException $e) {
    // Неизвестный ответ от сервера
} catch (NalogkaSdkException $e) {
    // Ошибка в SDK, например проблема с десереализацией
}}
```

### Запрос подробной информации о сделке

```php
$getDealRequest = (new GetDealRequest($apiClient))
    ->id(3);
    
try {
    $deal = $getDealRequest->request();
} catch (ApiErrorException $e) {
    // Отшибка от API
} catch (ServerErrorException $e) {
    // Неизвестный ответ от сервера
} catch (NalogkaSdkException $e) {
    // Ошибка в SDK, например проблема с десереализацией
}}
```

### Создание сделки

```php
$createDealRequest = (new CreateDealRequest($apiClient))
    ->orderId('ORDER-4127')
    ->conditions('Хрупкий, крупногабаритный груз')
    ->commissionPayer('seller')
    ->buyerHaveToPayOffline(0)
    ->subjectItem('Смартфон Apple iPhone 5s 16Gb Серебристый', 23500, 1, "test", "test")
    ->additionalService('Доставка СДЭК', 'Тариф Посылка Склад-Склад', 450, 400, 'seller', 'seller')
    ->partialBuyoutNorAllowed();

    
try {
    $deal = $createDealRequest->request();
} catch (ApiErrorException $e) {
    // Отшибка от API
} catch (ServerErrorException $e) {
    // Неизвестный ответ от сервера
} catch (NalogkaSdkException $e) {
    // Ошибка в SDK, например проблема с десереализацией
}}
```