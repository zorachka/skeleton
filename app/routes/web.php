<?php

declare(strict_types=1);

use League\Route\Router;
use Project\Blog\Infrastructure\UI\Http\IndexAction;

return static function (Router $router): void {
    $router->get('/', [IndexAction::class, 'handle']);
};
