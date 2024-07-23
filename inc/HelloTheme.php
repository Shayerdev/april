<?php

namespace Shayerdev\Theme;

class HelloTheme
{
    /**
     * @param string $phrase
     */
    public function __construct(
       private readonly string $phrase = 'Hello'
    ) {
    }

    /**
     * @return string
     */
    public function execute(): string
    {
        return $this->phrase;
    }
}
