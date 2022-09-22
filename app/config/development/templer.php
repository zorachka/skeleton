<?php

declare(strict_types=1);

use Zorachka\Infrastructure\Templer\Config;

return Config::withDefaults()
    ->withDebug(true)
    ->build();
