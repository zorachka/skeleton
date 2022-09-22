<?php

declare(strict_types=1);

namespace Project\Blog\Application\Post\ListPosts;

use ArrayIterator;
use Iterator;
use IteratorAggregate;
use Webmozart\Assert\Assert;

final class PostsCollection implements IteratorAggregate
{
    /**
     * @var Post[]
     */
    private array $posts;

    private function __construct()
    {
    }

    public static function create(array $posts): self
    {
        Assert::allIsInstanceOf($posts, Post::class);
        $self = new self();
        $self->posts = $posts;

        return $self;
    }

    public function getIterator(): Iterator
    {
        return new ArrayIterator($this->posts);
    }
}
