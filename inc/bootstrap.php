<?php

declare(strict_types=1);

$theme = wp_get_theme();
$themeRoot = $theme->get_theme_root();
$themeName = $theme->get_template();
$themePath = join('/', [$themeRoot, $themeName]);

require $themePath . '/vendor/autoload.php';
