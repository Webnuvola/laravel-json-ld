<?php

namespace Webnuvola\Laravel\JsonLd;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class JsonLdServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register json-ld service.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(JsonLd::class, function ($app) {
            return new JsonLd();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [JsonLd::class];
    }
}
