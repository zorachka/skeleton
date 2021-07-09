<?php

declare(strict_types=1);

use Zorachka\Infrastructure\Http\Config;

return (
    Config::defaults()
        ->rootPath(root_path())
)();
