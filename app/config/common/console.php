<?php

declare(strict_types=1);

use Zorachka\Application\Support\Env;
use Zorachka\Infrastructure\Console\Config;

return Config::withDefaults()
    ->withAppName(Env::get('APP_NAME') . ' Console')
    ->withCatchExceptions(Env::get('SENTRY_DSN') !== '')
    ->build();
