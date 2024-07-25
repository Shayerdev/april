<?php

declare(strict_types=1);

namespace April\Theme\Menus;

class MenuRegister implements MenuInterface
{
    public function __construct(
        private readonly string $location,
        private readonly string $name,
    ) {
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
