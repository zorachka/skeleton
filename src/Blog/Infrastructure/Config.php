<?php

declare(strict_types=1);

namespace Project\Blog\Infrastructure;

final class Config
{
    private array $config;

    private function __construct()
    {
    }

    public function build(): array
    {
        return [
            'config' => [
                'blog' => $this->config,
            ],
        ];
    }

    public static function withDefaults(): self
    {
        $self = new self();
        $self->config = [];

        return $self;
    }
}
