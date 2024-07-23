<?php

declare(strict_types=1);

namespace April\Theme\Scripts;

class ScriptRegister implements ScriptInterface
{
    public function __construct(
        private readonly string $handle,
        private readonly string $src,
        private readonly array $deps,
        private readonly bool|string|null $version,
        private readonly array|bool $args,
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

    public function getArguments(): array|bool
    {
        return $this->args;
    }
}
