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
require_once(__DIR__ . '/../vendor/autoload.php');

/**
 * Load rezonans core
 * @var Core $core
 */
$core = require_once(__DIR__ . '/core.php');

/**
 * Configuration, make the environment
 */
Configurator::loadEnv(Path::getProjectRoot('/.env'));

/**
 * App config
 */
require_once(Path::getConfigPath('/app.php'));