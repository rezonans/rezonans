<?php declare(strict_types=1);

use App\App;
use Monolog\Formatter\HtmlFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Rezonans\Core\Core;
use Rezonans\Core\Facades\Configurator;
use Rezonans\Core\Facades\Path;

/** @var Core $core */

(new App(__DIR__ . DIRECTORY_SEPARATOR . '..'))
    ->beforeRun(function (Core $core) {

        /** @var string $logPath */
        $logPath = Configurator::env('DEBUG_LOG', '/debug.log.html');

        $core->setLogger((new Logger('debug'))
            ->pushHandler(
                (new StreamHandler(
                    Path::getProjectRoot($logPath),
                    Logger::DEBUG))
                    ->setFormatter(
                        new HtmlFormatter()
                    )
            ));
    })
    ->handle($core);