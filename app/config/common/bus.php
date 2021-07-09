<?php

declare(strict_types=1);

use Zorachka\Infrastructure\CommandBus\Onliner\Config;

return (
    Config::defaults()
        ->addHandler(
            \Project\Tester\Application\TestCommands\Command::class,
            \Project\Tester\Application\TestCommands\Handler::class,
        )
)();
