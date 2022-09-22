<?php

declare(strict_types=1);

namespace Project\Blog\Domain\Post;

interface PostRepository
{
    /**
     * @return PostId
     */
    public function nextIdentity(): PostId;

    /**
     * @param PostId $id
     * @return Post
     */
    public function getById(PostId $id): Post;

    /**
     * @param Post $post
     */
    public function add(Post $post): void;

    /**
     * @param Post $post
     */
    public function update(Post $post): void;
}
