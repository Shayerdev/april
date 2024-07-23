<?php

declare(strict_types=1);

namespace April\Theme;

use April\Theme\Patterns\PatternCategoryRegistrar;
use April\Theme\Scripts\ScriptsRegistrar;
use April\Theme\Styles\StylesRegistrar;
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

        // Set Theme Parameters
        $this->themeParameters($containerBuilder, $params);

        // Compile IoC
        $containerBuilder->compile();

        // Setup custom Theme Pattern Categories
        $this->themePatternsCategory($containerBuilder);
        $this->themeAssets($containerBuilder);
    }

    /**
     * @param ContainerBuilder $containerBuilder
     * @param array $params
     * @return void
     */
    public function themeParameters(
        ContainerBuilder $containerBuilder,
        array $params
    ): void {
        $containerBuilder->setParameter('theme.slug', $params['theme.slug']);
        $containerBuilder->setParameter('theme.url', $params['theme.url']);
        $containerBuilder->setParameter('theme.path', $params['theme.path']);
    }

    /**
     * @param ContainerBuilder $containerBuilder
     * @return void
     * @throws Exception
     */
    public function themePatternsCategory(
        ContainerBuilder $containerBuilder
    ): void {
        /** @var PatternCategoryRegistrar $patternCategoryRegistrar */
        $patternCategoryRegistrar = $containerBuilder->get(PatternCategoryRegistrar::class);
        $patternCategoryRegistrar->init();
    }

    /**
     * @param ContainerBuilder $containerBuilder
     * @return void
     * @throws Exception
     */
    public function themeAssets(
        ContainerBuilder $containerBuilder
    ): void {
        /** @var ScriptsRegistrar $scriptsRegistrar */
        $scriptsRegistrar = $containerBuilder->get(ScriptsRegistrar::class);
        $scriptsRegistrar->init();

        /** @var StylesRegistrar $stylesRegistrar */
        $stylesRegistrar = $containerBuilder->get(StylesRegistrar::class);
        $stylesRegistrar->init();
    }
}
