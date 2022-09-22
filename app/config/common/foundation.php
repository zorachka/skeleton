<?php

declare(strict_types=1);

use Zorachka\Infrastructure\Http\Config;

use function Project\Common\root_path;

return Config::withDefaults()
    ->withRootPath(root_path())
    ->build();
