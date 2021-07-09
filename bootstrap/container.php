<?php

declare(strict_types=1);

use Project\Common\Infrastructure\Container\Builder;
use function Project\Common\root_path;

return (static function () {
    $rootPath = root_path();

    $dotenv = Dotenv\Dotenv::createUnsafeImmutable($rootPath);
    $dotenv->load();

    return Builder::build();
})();
