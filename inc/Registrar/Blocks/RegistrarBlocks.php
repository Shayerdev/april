<?php

declare(strict_types=1);

namespace Shayerdev\Theme\Registrar\Blocks;

use Shayerdev\Theme\Registrar\RegistrarInterface;

class RegistrarBlocks
{
    /**
     * @param RegistrarInterface[] $registrars
     */
    public function __construct(
        private readonly array $registrars
    ) {
    }

    /**
     * @return void
     */
    public function registration(): void
    {
        if (empty($registrars)) {
            return;
        }

        foreach ($this->registrars as $registrar) {
            $registrar->register();
        }
    }
}
