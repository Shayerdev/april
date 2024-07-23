<?php

/**
 * April WordPress theme
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage April
 * @since April 1.0
 */

use April\Theme\ThemeSetup;
use Symfony\Component\Config\FileLocator;

$theme = wp_get_theme();
$themeName = $theme->get_template();
$themeRoot = $theme->get_theme_root();
$themeUrl = $theme->get_theme_root_uri();
$themeRootPath = join('/', [$themeRoot, $themeName]);
$themeUrlPath = join('/', [$themeUrl, $themeName]);

require $themeRootPath . '/inc/bootstrap.php';

try {
    (new ThemeSetup())->run([
        'theme.slug' => 'april',
        'theme.path' => $themeRootPath,
        'theme.url' => $themeUrlPath,
        'config.services.path' => new FileLocator(__DIR__ . '/config'),
        'config.services.theme.file' => 'services.theme.yaml',
    ]);
} catch (Exception $e) {
    error_log($e->getMessage());
    var_dump($e);
}
