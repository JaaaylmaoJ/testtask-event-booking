<?php

namespace App\Providers;

use App\Services\Providers\Leadbook\ApiClient;
use App\Services\Providers\Leadbook\LeadbookProvider;
use App\Services\Providers\Leadbook\Services\BookPlaceService;
use App\Services\Providers\Leadbook\Services\EventGettingService;
use App\Services\Providers\Leadbook\Services\EventPlacesGettingService;
use App\Services\Providers\Leadbook\Services\ShowGettingService;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class BookingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LeadbookProvider::class, function (Application $app) {
            return new LeadbookProvider(
                app()->make(ShowGettingService::class),
                app()->make(EventGettingService::class),
                app()->make(EventPlacesGettingService::class),
                app()->make(BookPlaceService::class),
            );
        });

        $this->app->bind(ApiClient::class, function (Application $app) {
            return new ApiClient([
                'base_uri' => Config::get('content_providers.leadbook.base_uri'),
                'headers' => [
                    'Authorization' => sprintf("Bearer %s", Config::get('content_providers.leadbook.bearer'))
                ]
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
