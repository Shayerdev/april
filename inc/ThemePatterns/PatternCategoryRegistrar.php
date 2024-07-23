<?php

declare(strict_types=1);

namespace Shayerdev\Theme\ThemePatterns;

use Exception;

class PatternCategoryRegistrar
{
    /**
     * @param PatternCategoryInterface[] $patterns
     */
    public function __construct(
        private readonly array $patterns
    ) {
    }

    public function init(): void
    {
        add_action('init', [$this, 'register']);
    }

    /**
     * @throws \Exception
     */
    public function register(): void
    {
        if (empty($this->patterns)) {
            return;
        }

        foreach ($this->patterns as $pattern) {
            if (!$pattern instanceof PatternCategoryInterface) {
                throw new Exception("Invalid pattern category");
            }

            register_block_pattern_category(
                $pattern->getSlug(),
                [
                    'label' => $pattern->getName(),
                    'description' => $pattern->getDescription()
                ]
            );
        }
    }
}
