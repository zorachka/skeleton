<?php

declare(strict_types=1);

namespace Tests;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;
use Doctrine\Migrations\Provider\SchemaProvider;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

abstract class TestCaseWithDatabase extends TestCase
{
    private ?Connection $connection;
    /**
     * @var string[]
     */
    private array $dropStatements;
    /**
     * @var ContainerInterface|null
     */
    private ?ContainerInterface $container = null;

    public function container(): ContainerInterface
    {
        if ($this->container === null) {
            /** @var ContainerInterface $container */
            $this->container = require __DIR__ . '/../bootstrap/container.php';

            return $this->container;
        }

        return $this->container;
    }

    /**
     * @throws Exception
     */
    public function setUp(): void
    {
        $container = $this->container();

        /** @var Connection connection */
        $this->connection = $container->get(Connection::class);

        /** @var SchemaProvider $provider */
        $provider = $container->get(SchemaProvider::class);
        $schema = $provider->createSchema();

        $databasePlatform = $this->connection->getDatabasePlatform();
        $this->dropStatements = $schema->toDropSql($databasePlatform);
        $migrateStatements = $schema->toSql($databasePlatform);

        foreach ($migrateStatements as $statement) {
            $this->connection->executeQuery($statement);
        }

        $this->loadFixtures();

        parent::setUp();
    }

    /**
     * Load database fixtures.
     */
    abstract public function loadFixtures(): void;

    /**
     * @throws Exception
     */
    public function tearDown(): void
    {
        foreach ($this->dropStatements as $statement) {
            $this->connection->executeQuery($statement);
        }
        $this->connection->close();
        $this->connection = null;
        $this->container = null;

        parent::tearDown();
    }
}
