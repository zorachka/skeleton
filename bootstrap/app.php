<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use League\Route\Router;
use Project\Common\Infrastructure\Middlewares\MiddlewaresProvider;
use Zorachka\Infrastructure\Http\Application;

return static function (ContainerInterface $container): Application {
    /** @var Router $router */
    $router = $container->get(Router::class);
    $router->middlewares((new MiddlewaresProvider)());

    (require 'app/routes/web.php')($router);

    return $container->get(Application::class);
};
