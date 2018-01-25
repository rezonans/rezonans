<?php declare(strict_types=1);

use Rezonans\Core\Facades\Configurator;
use Rezonans\Core\Facades\Path;

/**
 * Wordpress use it to log down self errors
 */
$errorLogFile = (string)Configurator::env('ERROR_LOG');
ini_set('error_log', Path::getProjectRoot($errorLogFile));

/**
 * Wp config
 */
define('WP_HOME', Configurator::env('WP_HOME'));
define('WP_SITEURL', Configurator::env('WP_SITEURL'));

define('DB_HOST', Configurator::env('DB_HOST', 'No host'));
define('DB_NAME', Configurator::env('DB_NAME'));
define('DB_USER', Configurator::env('DB_USER'));
define('DB_PASSWORD', Configurator::env('DB_PASSWORD'));

define('DB_CHARSET', Configurator::env('DB_CHARSET', 'utf8mb4'));
define('DB_COLLATE', Configurator::env('DB_COLLATE', ''));

$table_prefix  = Configurator::env('WP_TABLE_PREFIX');

define('AUTH_KEY',         Configurator::env('AUTH_KEY', 'TODO: build the method to fill it automatic'));
define('SECURE_AUTH_KEY',  Configurator::env('SECURE_AUTH_KEY', 'TODO: build the method to fill it automatic'));
define('LOGGED_IN_KEY',    Configurator::env('LOGGED_IN_KEY', 'TODO: build the method to fill it automatic'));
define('NONCE_KEY',        Configurator::env('NONCE_KEY', 'TODO: build the method to fill it automatic'));
define('AUTH_SALT',        Configurator::env('AUTH_SALT', 'TODO: build the method to fill it automatic'));
define('SECURE_AUTH_SALT', Configurator::env('SECURE_AUTH_SALT', 'TODO: build the method to fill it automatic'));
define('LOGGED_IN_SALT',   Configurator::env('LOGGED_IN_SALT', 'TODO: build the method to fill it automatic'));
define('NONCE_SALT',       Configurator::env('NONCE_SALT', 'TODO: build the method to fill it automatic'));

define('WP_DEBUG', Configurator::env('WP_DEBUG', false));

if ( !defined('ABSPATH') )
    define('ABSPATH', Path::getWpPath('/'));
