<?php

namespace Exactum\Efac;

use Exactum\Efac\Enums\ExternalEnum;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class EfacServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/efac.php' => config_path('efac.php'),
            __DIR__.'/../config/activitylog.php' => config_path('activitylog.php'),
        ]);

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'efac-migrations');

        $this->publishes([
            __DIR__.'/../database/seeders' => database_path('seeders'),
        ], 'efac-seeders');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'efac');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/efac'),
            __DIR__.'/../resources/schemas' => resource_path('schemas'),
        ], 'efac-views');

        Http::macro('loginapi', function () {
            return Http::withHeaders([
                'Accept' => ExternalEnum::HeaderJson->value,
                'Content-Type' => ExternalEnum::HeaderFormEncoded->value,
            ])->baseUrl(config('efac.url_api') . 'seguridad');
        });

        Http::macro('api', function ($token) {
            return Http::withHeaders([
                'Accept' => ExternalEnum::HeaderJson->value,
                'Content-Type' => ExternalEnum::HeaderJson->value,
                'Authorization' => $token,
            ])->baseUrl(config('efac.url_api'));
        });
    }

    public function register()
    {

    }
}