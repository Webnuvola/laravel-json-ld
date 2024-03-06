<?php

use JsonLd\Context as TorannJsonLd;
use Webnuvola\Laravel\JsonLd\JsonLd;

it('can instance JsonLd class', function () {
    expect(new JsonLd())->toBeInstanceOf(JsonLd::class);
});

it('can add item', function () {
    $jsonLd = new JsonLd();
    $jsonLd->add(new TorannJsonLd('person', ['name' => 'John Doe']));

    expect($jsonLd->count())->toBe(1);
});

it('can create item', function () {
    $jsonLd = new JsonLd();
    $jsonldContext = $jsonLd->create('local_business', ['name' => 'Test Business']);

    expect($jsonLd->count())->toBe(1)
        ->and($jsonldContext->getProperties())->toBe([
            '@context' => 'http://schema.org',
            '@type' => 'LocalBusiness',
            'name' => 'Test Business',
        ]);
});

it('can count items', function () {
    $jsonLd = new JsonLd();
    expect($jsonLd->count())->toBe(0);

    $jsonLd->create('person', ['name' => 'John Doe']);
    expect($jsonLd->count())->toBe(1);

    $jsonLd->create('local_business', ['name' => 'Test Business']);
    expect($jsonLd->count())->toBe(2);
});

it('can generate output', function () {
    $jsonLd = new JsonLd();
    $jsonLd->create('person', ['name' => 'John Doe']);

    expect($jsonLd->generate())
        ->toBe('<script type="application/ld+json">{"@context":"http:\/\/schema.org","@type":"Person","name":"John Doe"}</script>');
});
