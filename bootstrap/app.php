<?php declare(strict_types=1);

use App\App;
use Monolog\Formatter\HtmlFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Rezonans\Core\Facades\Configurator;
use Rezonans\Core\Facades\Core;
use Rezonans\Core\Facades\Path;

(new App(__DIR__ . DIRECTORY_SEPARATOR . '..'))
    ->beforeRun(function (\Rezonans\Core\Core $core) {

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
    ->handle(Core::get('core'));