<?php

declare(strict_types=1);

namespace Project\Blog\Domain\Post\Event;

use Project\Blog\Domain\Post\PostId;

final class PostWasCreated
{
    private PostId $id;

    private function __construct()
    {
    }

    public static function withId(PostId $id): self
    {
        $self = new self();
        $self->id = $id;

        return $self;
    }

    public function id(): PostId
    {
        return $this->id;
    }
}
