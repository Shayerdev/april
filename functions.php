<?php

/**
 * Shayer Development theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage ShayerTheme
 * @since ShayerTheme 1.0
 */

use April\Theme\ThemeSetup;
use Symfony\Component\Config\FileLocator;

$theme = wp_get_theme();
$themeRoot = $theme->get_theme_root();
$themeName = $theme->get_template();
$themePath = join('/', [$themeRoot, $themeName]);

require $themePath . '/inc/bootstrap.php';

try {
    (new ThemeSetup())->run([
        'theme.path' => $themePath,
        'config.services.path' => new FileLocator(__DIR__ . '/config'),
        'config.services.theme.file' => 'services.theme.yaml',
    ]);
} catch (Exception $e) {
    error_log($e->getMessage());
    var_dump($e);
}
