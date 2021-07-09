<?php

declare(strict_types=1);

namespace Project\Example\Infrastructure;

final class Config
{
    private array $config;

    private function __construct()
    {
    }

    public function __invoke(): array
    {
        return [
            'config' => [
                'example' => $this->config,
            ],
        ];
    }

    public static function defaults(): self
    {
        $self = new self();
        $self->config = [];

        return $self;
    }
}
