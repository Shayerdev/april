<?php

declare(strict_types=1);

namespace April\Theme\Styles;

interface StylesInterface {
    public function getHandle(): string;
    public function getSrc(): string;
    public function getDeps(): array;
    public function getVersion(): bool|null|string;
    public function getMedia(): string;
}
