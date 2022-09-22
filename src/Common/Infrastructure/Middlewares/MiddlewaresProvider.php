<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Middlewares;

use Zorachka\Infrastructure\Middleware\ClearEmptyStrings;
use Zorachka\Infrastructure\Middleware\DomainExceptionHandler;

final class MiddlewaresProvider
{
    public function __invoke(): array
    {
        return [
            DomainExceptionHandler::class,
            ClearEmptyStrings::class,
        ];
    }
}
