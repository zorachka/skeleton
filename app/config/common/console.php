<?php

declare(strict_types=1);

use Zorachka\Application\Support\Env;
use Zorachka\Infrastructure\Console\Config;

return (
    Config::defaults()
        ->appName(Env::get('APP_NAME') . ' Console')
        ->catchExceptions(Env::get('SENTRY_DSN') !== '')
)();
