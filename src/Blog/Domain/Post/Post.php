<?php

declare(strict_types=1);

namespace Project\Blog\Domain\Post;

use DateTimeImmutable;
use Project\Blog\Domain\Post\Event\PostWasCreated;
use Zorachka\Application\Support\Mapping;
use Zorachka\Domain\DateTimeImmutable\TimeZoneAwareDateTime;
use Zorachka\Domain\EventDispatcher\EventRecordingCapabilities;

final class Post
{
    use EventRecordingCapabilities;
    use Mapping;

    private PostId $id;
    private PostTitle $title;
    private DateTimeImmutable $createdAt;

    private function __construct()
    {
    }

    public static function create(
        PostId $id,
        PostTitle $title,
        DateTimeImmutable $createdAt
    ): self {
        $self = new self();
        $self->id = $id;
        $self->title = $title;
        $self->createdAt = $createdAt;

        $self->registerThat(
            PostWasCreated::withId($id)
        );

        return $self;
    }

    public function fromState(array $state): self
    {
        $self = new self();
        $self->id = PostId::fromString(
            self::getString($state, 'id')
        );
        $self->title = PostTitle::fromString(
            self::getString($state, 'title')
        );
        $self->createdAt = TimeZoneAwareDateTime::createDateTimeImmutable(
            self::getString($state, 'createdAt')
        );

        return $self;
    }

    public function state(): array
    {
        return [
            'id' => $this->id->asString(),
            'title' => $this->title->asString(),
            'createdAt' => TimeZoneAwareDateTime::formatToString($this->createdAt),
        ];
    }
}
