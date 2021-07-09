<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Zorachka\Infrastructure\Console\Application;

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

/** @var ContainerInterface $container */
$container = require 'bootstrap/container.php';

/** @var Application $application */
$application = $container->get(Application::class);
$application->run();
