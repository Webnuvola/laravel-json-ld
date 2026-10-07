<?php

use JsonLd\Context;
use Webnuvola\Laravel\JsonLd\JsonLd;

if (! function_exists('jsonld')) {
    /**
     * Return JsonLd instance.
     */
    function jsonld(?string $context = null, array $data = []): Context|JsonLd
    {
        if ($context) {
            return app(JsonLd::class)
                ->create($context, $data);
        }

        return app(JsonLd::class);
    }
}
