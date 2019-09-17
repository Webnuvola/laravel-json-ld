<?php

namespace Webnuvola\Laravel\JsonLd;

use JsonLd\Context as TorannJsonLd;
use Illuminate\Contracts\Support\Htmlable;

class JsonLd implements Htmlable
{
    /**
     * Contains all TorannJsonLd instances.
     *
     * @var \JsonLd\Context[]
     */
    protected $jsonLd = [];

    /**
     * Add a new TorannJsonLd instance.
     *
     * @param \JsonLd\Context $jsonLd
     */
    public function add(TorannJsonLd $jsonLd): void
    {
        $this->jsonLd[] = $jsonLd;
    }

    /**
     * Create a new TorannJsonLd instance and add it to array.
     *
     * @param string $context
     * @param array $data
     * @return \JsonLd\Context
     */
    public function create(string $context, array $data = []): TorannJsonLd
    {
        $jsonldContext = new TorannJsonLd($context, $data);
        $this->add($jsonldContext);
        return $jsonldContext;
    }

    /**
     * Count the TorannJsonLd instances.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->jsonLd);
    }

    /**
     * Generate html output.
     *
     * @return string
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
     *
     * @return string
     */
    public function toHtml(): string
    {
        return $this->generate();
    }

    /**
     * Get the HTML string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->toHtml();
    }
}
