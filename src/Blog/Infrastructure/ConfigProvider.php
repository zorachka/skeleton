<?php

declare(strict_types=1);

namespace Project\Blog\Infrastructure;

final class ConfigProvider
{
    public function __invoke(): array
    {
        $defaultConfig = Config::withDefaults();
        $defaults = $defaultConfig->build();

        return [
            'config' => $defaults['config'],
        ];
    }
}
