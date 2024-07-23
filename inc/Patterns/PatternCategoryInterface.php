<?php

declare(strict_types=1);

namespace April\Theme\Patterns;

interface PatternCategoryInterface {
    public function getSlug(): string;
    public function getName(): string;
    public function getDescription(): string;
}
