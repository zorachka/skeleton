<?php

declare(strict_types=1);

use Zorachka\Infrastructure\Templer\Twig\Config;
use Zorachka\Infrastructure\Templer\Twig\Extensions\Frontend\FrontendUrlTwigExtension;

return Config::withDefaults()
    ->withExtension(FrontendUrlTwigExtension::class)
    ->build();
