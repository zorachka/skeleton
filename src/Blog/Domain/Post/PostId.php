<?php

declare(strict_types=1);

namespace Project\Blog\Domain\Post;

use Webmozart\Assert\Assert;

final class PostId
{
    private string $id;

    private function __construct()
    {
    }

    public static function fromString(string $id): self
    {
        Assert::uuid($id);
        $self = new self();
        $self->id = $id;

        return $self;
    }

    public function asString(): string
    {
        return $this->id;
    }
}
