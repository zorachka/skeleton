<?php

declare(strict_types=1);

use Zorachka\Infrastructure\Logger\Config;

return (
    Config::defaults()
        ->debug(true)
        ->file(root_path('var/log') . '/application_test.log')
        ->stderr(false)
)();
