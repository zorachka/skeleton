<?php

declare(strict_types=1);

namespace Project\Example\Infrastructure;

final class ConfigProvider
{
    public function __invoke(): array
    {
        $config = Config::defaults();
        $defaults = $config();

        return [
            'config' => $defaults['config'],
        ];
    }
}
