<?php

declare(strict_types=1);

use League\Route\Router;
use Project\Example\UI\Http\IndexAction;

return static function (Router $router): void {
    $router->get('/', [IndexAction::class, 'handle']);
};
