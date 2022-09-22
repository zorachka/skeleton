<?php

declare(strict_types=1);

use Zorachka\Infrastructure\Logger\Config;

use function Project\Common\root_path;

return Config::withDefaults()
    ->withDebug(true)
    ->withFile(root_path('var/log') . '/application.log')
    ->build();
