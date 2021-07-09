<?php

declare(strict_types=1);

use Zorachka\Infrastructure\Templer\Config;

return (
    Config::defaults()
        ->cacheDir('var/cache/twig')
)();
