# SDK для работы с API Безопасных сделок Наложка.рф

- [Документация по API Безопасных сделок](https://api.nalogka.ru/deals.html)

## Исключение

Во время выполнения запроса и получения ответа могут возникнуть исключения:

- `Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException` - Исключение, выбрасываемое в случае, когда API отдает ошибку.
Исключение содержит в себе объект ошибки из неймспейса `Fostenslave\NalogkaDealsSDK\Errors\`

- `Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException` - Исключение, выбрасываемое когда возникают ошибки в SDK.

- `Fostenslave\NalogkaDealsSDK\Exception\ServerErrorException` - Исключение, выбрасываемое в случае неудачного запроса к серверу.

## Примеры использования SDK

### Инициализация api-клиента и компонента сериализатора

Для успешного создания экземпляра api-клиента необходимо передать в конструктор базовый url production или sandbox api-сервера,
заголовок, содержащий токен аутентификации и компонент сериализатора.

```php
use Fostenslave\NalogkaDealsSDK\ApiClient;
use Fostenslave\NalogkaDealsSDK\Serialization\SerializationComponent;

$serializationComponent = new SerializationComponent();

$apiClient = new ApiClient("https://sandbox.deals.api.nalogka.ru/", [
    'headers' => [
        'X-Nalogka-Auth-Token' => '9qASPlstioSjksdqpLkSF2js8Iks1CIv'
    ],
], $serializationComponent);
```

### Запрос списка сделок

```php
use Fostenslave\NalogkaDealsSDK\Request\DealsListRequest;
use Fostenslave\NalogkaDealsSDK\Exception\ApiErrorException;
use Fostenslave\NalogkaDealsSDK\Exception\NalogkaSdkException;
use Fostenslave\NalogkaDealsSDK\Exception\ServerErrorException;

$dealsListRequest = (new DealsListRequest($apiClient))
    ->page(1)
    ->items(3);

try {
    $deals = $dealsListRequest->request();
} catch (ApiErrorException $e) {
    // Ошибка от API
} catch (ServerErrorException $e) {
    // Неизвестный ответ от сервера
} catch (NalogkaSdkException $e) {
    // Ошибка в SDK, например проблема с десериализация
}
```

### Запрос подробной информации о сделке

```php
use Fostenslave\NalogkaDealsSDK\Request\DealGetRequest;

$dealGetRequest = (new DealGetRequest($apiClient))
    ->id(60);

$deal = $dealGetRequest->request();
```

### Создание сделки

```php
use Fostenslave\NalogkaDealsSDK\Request\DealCreateRequest;

$dealCreateRequest = (new DealCreateRequest($apiClient))
    ->orderId('4127')
    ->conditions('Хрупкий, крупногабаритный груз')
    ->commissionPayer('seller')
    ->buyerHaveToPayOffline(0)
    ->subjectItem('Смартфон Apple iPhone 5s 16Gb Серебристый', 23500, 1, "test", "test")
    ->additionalService('Доставка СДЭК', 'Тариф Посылка Склад-Склад', 450, 400, 'seller', 'seller')
    ->partialBuyoutNotAllowed();

$deal = $dealCreateRequest->request();
```

### Установка трека исполнения сделки

```php
use Fostenslave\NalogkaDealsSDK\Request\DealPerformingTrackSetRequest;

$dealPerformingTrackSetRequest = (new DealPerformingTrackSetRequest($apiClient))
    ->id(60)
    ->trackerShortName('cdek')
    ->code('8172990122');

$track = $dealPerformingTrackSetRequest->request();
```

### Удаление трека исполнения сделки

```php
use Fostenslave\NalogkaDealsSDK\Request\DealPerformingTrackDeleteRequest;

(new DealPerformingTrackDeleteRequest($apiClient))
    ->id(373)
    ->request();
```