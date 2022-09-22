<?php

declare(strict_types=1);

namespace Project\Blog\Application\Post\CreatePost;

use Zorachka\Application\Support\Mapping;

final class Command
{
    use Mapping;

    public string $title;

    private function __construct()
    {
    }

    public static function fromRequestData(array $data): self
    {
        $self = new self();
        $self->title = self::getString($data, 'title');

        return $self;
    }
}
