<?php

declare(strict_types=1);

namespace April\Theme\Styles;

class StyleRegister implements StylesInterface
{
    public function __construct(
        private readonly string $handle,
        private readonly string $src,
        private readonly array $deps,
        private readonly bool|string|null $version,
        private readonly string $media,
    ) {
    }

    public function getHandle(): string
    {
        return $this->handle;
    }

    public function getSrc(): string
    {
        return $this->src;
    }

    public function getDeps(): array
    {
        return $this->deps;
    }

    public function getVersion(): bool|null|string
    {
        return $this->version;
    }

    public function getMedia(): string
    {
        return $this->media;
    }
}
