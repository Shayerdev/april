<?php

declare(strict_types=1);

namespace April\Theme\Menus;

interface MenuInterface {
    public function getLocation(): string;
    public function getName(): string;
}
