#!/bin/bash
docker-compose exec php-fpm php ./vendor/bin/wp-cli.phar core install --url='http://localhost' --title='title' --admin_user='admin@test.com' --admin_password='1234qwerrbaetGRGW' --admin_email='admin@test.com' --skip-email --path=wordpress --allow-root --debug
docker-compose exec php-fpm php ./vendor/bin/wp-cli.phar theme activate rezonans --path=wordpress --allow-root --debug
docker-compose exec php-fpm php ./vendor/bin/wp-cli.phar plugin activate advanced-custom-fields --path=wordpress --allow-root --debug
docker-compose exec php-fpm php ./vendor/bin/wp-cli.phar rewrite structure '/%category%/%postname%/' --path=wordpress --allow-root --debug