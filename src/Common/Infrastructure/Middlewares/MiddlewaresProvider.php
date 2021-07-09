<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Middlewares;

use Middlewares\Whoops;

final class MiddlewaresProvider
{
    public function __invoke(): array
    {
        return [
            new Whoops(),
        ];
    }
}
