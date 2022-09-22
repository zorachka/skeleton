<?php

declare(strict_types=1);

namespace Project\Blog\Application\Post\ListPosts;

use Project\Blog\Domain\Post\PostTitle;

final class Post
{
    private PostTitle $title;

    public function create(PostTitle $title): self
    {
        $self = new self();
        $self->title = $title;

        return $self;
    }

    /**
     * @return PostTitle
     */
    public function title(): PostTitle
    {
        return $this->title;
    }
}
