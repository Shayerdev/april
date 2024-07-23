<?php

declare(strict_types=1);

namespace Shayerdev\Theme\Registrar\Blocks;

use April\Theme\Registrar\RegistrarInterface;

class RegistrarBlock implements RegistrarInterface
{
    public function __construct(
        private readonly string $handle,
        private readonly string $fileName,
        private readonly string $blockType,
        private readonly string $deps,
        private readonly string $version
    ) {
        add_action('init', 'registration');
    }

    /**
     * @return void
     */
    public function register(): void
    {
        wp_register_script(
            $this->handle,
            $this->fileName,
            $this->deps,
            $this->version
        );

        register_block_type($this->blockType, ['editor_script' => $this->handle]);
    }
}
