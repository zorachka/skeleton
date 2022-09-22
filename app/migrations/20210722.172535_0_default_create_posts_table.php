<?php

namespace Migration;

use Spiral\Migrations\Migration;

class OrmDefaultE35c2a8bf0c6a74d398581eae83963f3 extends Migration
{
    protected const DATABASE = 'default';

    public function up(): void
    {
        $this->table('posts')
            ->addColumn('id', 'uuid')
            ->addColumn('title', 'string')
            ->setPrimaryKeys(['id'])
            ->create();
    }

    public function down(): void
    {
        $this->table('posts')->drop();
    }
}
