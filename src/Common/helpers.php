<?php

declare(strict_types=1);

namespace Project\Common;

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
