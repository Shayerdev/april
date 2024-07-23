<?php

declare(strict_types=1);

namespace April\Theme;

use April\Theme\ThemePatterns\PatternCategoryRegistrar;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Exception;

class ThemeSetup
{
    /**
     * @param array $params
     * @return void
     * @throws Exception
     */
    public function run(array $params): void
    {
        $containerBuilder = new ContainerBuilder();
        $loader = new YamlFileLoader($containerBuilder, $params['config.services.path']);
        $loader->load($params['config.services.theme.file']);

        $containerBuilder->setParameter('theme.path', $params['theme.path']);

        $containerBuilder->compile();

        $this->themePatternsCategory($containerBuilder);
    }


    /**
     * @throws Exception
     */
    public function themePatternsCategory(
        ContainerBuilder $containerBuilder
    ): void
    {
        /** @var PatternCategoryRegistrar $patternCategoryRegistrar */
        $patternCategoryRegistrar = $containerBuilder->get(PatternCategoryRegistrar::class);
        $patternCategoryRegistrar->init();
    }
}
