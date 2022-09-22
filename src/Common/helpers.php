<?php

declare(strict_types=1);

namespace Project\Common;

use Zorachka\Application\Support\Env;

if (! function_exists('root_path')) {
    /**
     * Return root path for application.
     * @param string $path
     * @return string
     */
    function root_path(string $path = ''): string
    {
        return realpath(__DIR__ . '/../../' . $path);
    }
}

if (! function_exists('is_production')) {
    /**
     * @return bool
     */
    function is_production(): bool
    {
        return Env::get('APP_NAME') === 'production';
    }
}
