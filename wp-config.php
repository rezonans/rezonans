<?php declare(strict_types=1);

use Rezonans\Core\Facades\Path;

/** Start init */
require_once(__DIR__ . '/bootstrap/init.php');

/** Wordpress settings up */
require_once(Path::getWpPath('/wp-settings.php'));

/*
docker-compose -f ./docker-compose.test.yml up -d
docker-compose exec php-fpm php ./vendor/bin/wp-cli.phar core install --url='http://localhost' --title='title' --admin_user='admin@test.com' --admin_password='1234qwerrbaetGRGW' --admin_email='admin@test.com' --skip-email --path=wordpress --allow-root --debug
docker-compose exec php-fpm php ./vendor/bin/wp-cli.phar theme activate rezonans --path=wordpress --allow-root --debug
*/