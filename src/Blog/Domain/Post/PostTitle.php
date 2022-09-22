<?php

declare(strict_types=1);

namespace Project\Blog\Domain\Post;

use Webmozart\Assert\Assert;

final class PostTitle
{
    private string $title;

    private function __construct()
    {
    }

    public static function fromString(string $title): self
    {
        Assert::notEmpty($title);
        $self = new self();
        $self->title = $title;

        return $self;
    }

    public function asString(): string
    {
        return $this->title;
    }
}
