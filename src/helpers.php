<?php

use JsonLd\Context as TorannJsonLd;
use Webnuvola\Laravel\JsonLd\JsonLd;

if (! function_exists('jsonld')) {
    /**
     * Return JsonLd instance.
     *
     * @param  string $context
     * @param  array $data
     * @return \JsonLd\Context|\Webnuvola\Laravel\JsonLd\JsonLd
     */
    function jsonld(string $context = null, array $data = [])
    {
        if ($context) {
            return app(JsonLd::class)
                ->create($context, $data);
        }

        return app(JsonLd::class);
    }
}
