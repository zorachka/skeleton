<?php

declare(strict_types=1);

namespace Project\Blog\Infrastructure\Persistence\Schema;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Zorachka\Infrastructure\Database\Migrations\Schema\SpecifiesSchema;

final class PostSchema implements SpecifiesSchema
{
    public static function specifySchema(Schema $schema): void
    {
        $table = $schema->createTable('posts');
        $table->addColumn('id', Types::GUID);
        $table->addColumn('title', Types::STRING);
        $table->addColumn('created_at', Types::DATETIME_IMMUTABLE);
        $table->addColumn('scheduled_at', Types::DATETIME_IMMUTABLE);
        $table->addColumn('is_published', Types::BOOLEAN);
        $table->setPrimaryKey(['id']);
    }
}
