<?php declare(strict_types=1);

use Rezonans\Core\Core;
use Rezonans\Core\Facades\Configurator;
use Rezonans\Core\Facades\Path;

/**
 * The root of whole project
 */
define('REZONANS_ROOT', realpath(__DIR__ . '/../'));

/**
 * PSR-4 Autoload
 */
require_once(__DIR__ . '/vendor/autoload.php');

/**
 * Load rezonans core
 * @var Core $core
 */
$core = require_once(__DIR__ . '/bootstrap/core.php');

/**
 * Configuration, make the environment
 */
Configurator::loadEnv(Path::getProjectRoot('/.env'));

/**
 * App config
 */
require_once(__DIR__ . '/config/app.php');

/**
 * Wordpress settings up
 */
require_once(Path::getWpPath('/wp-settings.php'));

/**
 * Load rezonans app
 */
require_once(__DIR__ . '/bootstrap/app.php');

/*
 * docker-compose exec php php ./vendor/bin/wp-cli.phar core install --url='http://localhost' --title='title' --admin-user='admin@test.com' --admin-password='1234qwerrbaetGRGW' --admin-email='admin@test.com' --skip-email --path=wordpress --allow-root --debug
 */