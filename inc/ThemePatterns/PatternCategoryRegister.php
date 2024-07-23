<?php

declare(strict_types=1);

namespace April\Theme\ThemePatterns;

class PatternCategoryRegister implements PatternCategoryInterface
{
    public function __construct(
        private readonly string $slug,
        private readonly string $name,
        private readonly string $description,
    ) {
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
