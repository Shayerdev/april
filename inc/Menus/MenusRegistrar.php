<?php

declare(strict_types=1);

namespace April\Theme\Menus;

use April\Theme\RegistrarInitInterface;
use Exception;

class MenusRegistrar implements RegistrarInitInterface
{
    /**
     * @param MenuInterface[] $menus
     */
    public function __construct(
        private readonly array $menus
    ) {
    }

    public function init(): void
    {
        add_action('init', [$this, 'register']);
    }

    /**
     * @throws Exception
     */
    public function register(): void
    {
        if (empty($this->menus)) {
            return;
        }

        foreach ($this->menus as $menu) {
            if (!$menu instanceof MenuInterface) {
                throw new Exception("Invalid menu");
            }

            register_nav_menus([
                $menu->getLocation() => $menu->getName()
            ]);
        }
    }
}
