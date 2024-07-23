<?php

declare(strict_types=1);

namespace April\Theme\Scripts;

interface ScriptInterface {
    public function getHandle(): string;
    public function getSrc(): string;
    public function getDeps(): array;
    public function getVersion(): bool|null|string;
    public function getArguments(): array|bool;
}
