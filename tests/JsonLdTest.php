<?php

namespace Webnuvola\Laravel\JsonLd\Tests;

use PHPUnit\Framework\TestCase;
use JsonLd\Context as TorannJsonLd;
use Webnuvola\Laravel\JsonLd\JsonLd;

final class JsonLdTest extends TestCase
{
    public function testCreateClass()
    {
        $this->assertInstanceOf(JsonLd::class, new JsonLd());
    }

    public function testAddItem()
    {
        $jsonLd = new JsonLd();
        $jsonLd->add(new TorannJsonLd('person', ['name' => 'John Doe']));

        $this->assertEquals(1, $jsonLd->count());
    }

    public function testCreateItem()
    {
        $jsonLd = new JsonLd();
        $jsonldContext = $jsonLd->create('local_business', ['name' => 'Test Business']);

        $this->assertEquals(1, $jsonLd->count());

        $properties = $jsonldContext->getProperties();
        $this->assertEquals('LocalBusiness', $properties['@type']);
        $this->assertEquals('Test Business', $properties['name']);
    }

    public function testCount()
    {
        $jsonLd = new JsonLd();
        $this->assertEquals(0, $jsonLd->count());

        $jsonLd->create('person', ['name' => 'John Doe']);
        $this->assertEquals(1, $jsonLd->count());

        $jsonLd->create('local_business', ['name' => 'Test Business']);
        $this->assertEquals(2, $jsonLd->count());
    }

    public function testGenerate()
    {
        $jsonLd = new JsonLd();
        $jsonLd->create('person', ['name' => 'John Doe']);

        $generated = $jsonLd->generate();
        $this->assertStringContainsString('<script type="application/ld+json">', $generated);
        $this->assertStringContainsString('</script>', $generated);
        $this->assertStringContainsString('John Doe', $generated);
    }

    public function testToHtml()
    {
        $jsonLd = new JsonLd();
        $jsonLd->create('person', ['name' => 'John Doe']);

        $this->assertIsString($jsonLd->toHtml());
    }

    public function testToString()
    {
        $jsonLd = new JsonLd();
        $jsonLd->create('person', ['name' => 'John Doe']);

        $this->assertIsString((string) $jsonLd);
    }
}
