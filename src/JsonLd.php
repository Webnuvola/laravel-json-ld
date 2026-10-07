<?php

namespace Webnuvola\Laravel\JsonLd;

use Illuminate\Contracts\Support\Htmlable;
use JsonLd\Context;
use JsonLd\Context as TorannJsonLd;

class JsonLd implements Htmlable
{
    /**
     * Contains all TorannJsonLd instances.
     *
     * @var Context[]
     */
    protected $jsonLd = [];

    /**
     * Add a new TorannJsonLd instance.
     */
    public function add(TorannJsonLd $jsonLd): void
    {
        $this->jsonLd[] = $jsonLd;
    }

    /**
     * Create a new TorannJsonLd instance and add it to array.
     */
    public function create(string $context, array $data = []): TorannJsonLd
    {
        $jsonldContext = new TorannJsonLd($context, $data);
        $this->add($jsonldContext);

        return $jsonldContext;
    }

    /**
     * Count the TorannJsonLd instances.
     */
    public function count(): int
    {
        return count($this->jsonLd);
    }

    /**
     * Generate html output.
     */
    public function generate(): string
    {
        $html = [];

        foreach ($this->jsonLd as $jsonLd) {
            $html[] = $jsonLd->generate();
        }

        return implode("\n", $html);
    }

    /**
     * Get content as a string of HTML.
     */
    public function toHtml(): string
    {
        return $this->generate();
    }

    /**
     * Get the HTML string.
     */
    public function __toString(): string
    {
        return $this->toHtml();
    }
}
