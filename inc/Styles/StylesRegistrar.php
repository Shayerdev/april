<?php

declare(strict_types=1);

namespace April\Theme\Styles;

use April\Theme\RegistrarInitInterface;
use Exception;

class StylesRegistrar implements RegistrarInitInterface
{
    /**
     * @param StylesInterface[] $styles
     */
    public function __construct(
        private readonly array $styles
    ) {
    }

    public function init(): void
    {
        add_action('wp_enqueue_scripts', [$this, 'register']);
    }

    /**
     * @throws Exception
     */
    public function register(): void
    {
        if (empty($this->styles)) {
            return;
        }

        foreach ($this->styles as $style) {
            if (!$style instanceof StylesInterface) {
                throw new Exception("Invalid style");
            }

            wp_enqueue_style(
                $style->getHandle(),
                $style->getSrc(),
                $style->getDeps(),
                $style->getVersion(),
                $style->getMedia(),
            );
        }
    }
}
