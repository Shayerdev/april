<?php

declare(strict_types=1);

namespace April\Theme\Scripts;

use Exception;

class ScriptsRegistrar
{
    /**
     * @param ScriptInterface[] $scripts
     */
    public function __construct(
        private readonly array $scripts
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
        if (empty($this->scripts)) {
            return;
        }

        foreach ($this->scripts as $script) {
            if (!$script instanceof ScriptInterface) {
                throw new Exception("Invalid script");
            }

            wp_enqueue_script(
                $script->getHandle(),
                $script->getSrc(),
                $script->getDeps(),
                $script->getVersion(),
                $script->getArguments()
            );
        }
    }
}
