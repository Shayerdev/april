<?php

declare(strict_types=1);

namespace April\Theme\Patterns;

use April\Theme\RegistrarInitInterface;
use Exception;

class PatternCategoryRegistrar implements RegistrarInitInterface
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
     * @throws Exception
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
