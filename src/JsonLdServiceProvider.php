<?php

namespace Webnuvola\Laravel\JsonLd;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class JsonLdServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register json-ld service.
     */
    public function register(): void
    {
        $this->app->singleton(JsonLd::class, function ($app) {
            return new JsonLd();
        });
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [JsonLd::class];
    }
}
