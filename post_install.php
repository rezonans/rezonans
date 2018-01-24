<?php

namespace PostInstallScript;

/**
 * Do not run this script manually if u don't know what you doing
 */

$basePath = __DIR__;
$binPath = $basePath . '/vendor/bin';
$wpPath = $basePath . '/wordpress';

$wpCliPath = $binPath . '/wp-cli.phar';
if(!is_dir($binPath)) {
    mkdir($binPath);
}

if (!file_exists($wpCliPath)) {
    copy('https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar', $wpCliPath);
}

if (!is_dir($wpPath)) {
    throw new \Exception("Have no installed wordpress!");
}

copy(__DIR__ . '/.env.dist', __DIR__ . '/.env');

$themeFolder = $wpPath . '/wp-content/themes/rezonans';

$foldersToCreate = [
    $themeFolder . '/css',
    $themeFolder . '/fonts',
    $themeFolder . '/images',
    $themeFolder . '/js',
    $basePath . '/src',
    $basePath . '/src/app',
    $basePath . '/src/app/templates',
];

$createDir = function ($dirPath) {
    if (!is_dir($dirPath)) {
        if (is_file($dirPath)) {
            @unlink($dirPath);
        }
        mkdir($dirPath);
    }
};

$createDir($themeFolder);
foreach ($foldersToCreate as $dirPath) {
    $createDir($dirPath);
}

/**
 * functions.php, to start Rezonans Application
 */
$functionsPhpPath = $themeFolder . '/functions.php';
$functionsPhpContent = <<<'END'
<?php

END;

file_put_contents($functionsPhpPath, $functionsPhpContent);

/**
 * Just stubs to guarantee WP correct work
 */
$indexPhpPath = $themeFolder . '/index.php';
$indexPhpContent = <<<'END'
<?php
/**
 * Keep the silence
 */
END;

file_put_contents($indexPhpPath, $indexPhpContent);

$styleSheetsStubPath = $themeFolder . '/style.css';
$styleSheetsStubContent = <<<'END'
/*
Theme Name: Rezonans
Theme URI: https://github.com/rezonans/rezonans
Author: Alexandr Shevchenko [Shov] ls.shov@gmail.com
Author URI: https://github.com/shov/
*/

END;

file_put_contents($styleSheetsStubPath, $styleSheetsStubContent);

$screenshotPath = $themeFolder . '/screenshot.png';

$screenshotImg = imagecreatetruecolor(300, 300);
$bgColor = imagecolorallocate($screenshotImg, 255, 255, 255);
$textColor = imagecolorallocate($screenshotImg, 0, 0, 0);

imagefilledrectangle($screenshotImg, 0, 0, 300, 300, $bgColor);
imagestring($screenshotImg, 5, 100, 100, "Rezonans", $textColor);

imagepng($screenshotImg, $screenshotPath);
