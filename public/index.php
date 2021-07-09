<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Zorachka\Application\ExceptionHandler\ExceptionHandler;
use Zorachka\Infrastructure\Http\Application;

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

/**
 * Self-called anonymous function that creates its own scope and keeps the global namespace clean.
 */
(function () {
    /** @var ContainerInterface $container */
    $container = require 'bootstrap/container.php';

    /** @var ExceptionHandler $exceptionHandler */
    $exceptionHandler = $container->get(ExceptionHandler::class);
    $exceptionHandler->init();

    /** @var Application $app */
    $app = (require 'bootstrap/app.php')($container);
    $app->run();
})();
