## Развертывание

1. запуск проекта `docker compose up -d`
2. установить зависимости в контейнере `app.event-booking.php`
3. возможно, понадобится выдать права на файлы в контейнере т.к. зависимости установятся под рутом
4. возможно, понадобится поменять порт с 8080 на другой свободный

## Структура

Сам код - `./app`

Документация - `./openapi`

Примеры запросов - `./http/local.http`

Локальный хост - `booking.localhost:8080`

## Пояснения к проекту

* Роуты не используют струкутуру `/events/{eventId:\d+}/places` потому что удобней, когда все параметры и всегда описаны в реквестах

* В проекте используется фабрика [ProviderFactory.php](app%2Fapp%2FServices%2FProviders%2FProviderFactory.php) для того чтобы можно было добавить нового провайдера с минимальными трудозатратами.
Для этого необходимо добавить обработчики ответов нового провайдера и добавить билд класса нового провайдера в `BookingServiceProvider` на примере `LeadbookProvider`
```php
$this->app->bind(LeadbookProvider::class, function (Application $app) {
    return new LeadbookProvider(
        app()->make(ShowGettingService::class),
        app()->make(EventGettingService::class),
        app()->make(EventPlacesGettingService::class),
        app()->make(BookPlaceService::class),
    );
});
```