<?php

declare(strict_types=1);

namespace Project\Common\Infrastructure\Container;

use DI\ContainerBuilder;
use Laminas\ConfigAggregator\ConfigAggregator;
use Laminas\ConfigAggregator\PhpFileProvider;
use Project\Blog\Infrastructure\ConfigProvider;
use function Project\Common\root_path;
use Psr\Container\ContainerInterface;

use Zorachka\Application\Support\Env;

final class Builder
{
    public static function build(): ContainerInterface
    {
        $configPath = root_path('app/config');
        $configsPath = $configPath . '/common/*.php';
        $envConfigsPath = $configPath . '/' . (Env::get('APP_ENV') ?: 'production') . '/*.php';

        $cacheConfig = [
            'config_cache_path' => root_path('var/cache/config') . '/config-cache.php',
            'container_cache_path' => root_path('var/cache/container'),
            'container_proxies_cache_path' => root_path('var/cache/container/proxies'),
        ];

        $isProduction = Env::get('APP_ENV') === 'production';
        $cachedConfigFile = $isProduction ? $cacheConfig['config_cache_path'] : null;

        $builder = new ContainerBuilder();
        $aggregator = new ConfigAggregator([
            // Framework
            \Zorachka\Infrastructure\ExceptionHandler\ConfigProvider::class,

            // Apps
            \Zorachka\Infrastructure\Console\ConfigProvider::class,
            \Zorachka\Infrastructure\Http\ConfigProvider::class,

            // Clock
            \Zorachka\Infrastructure\Clock\ConfigProvider::class,

            // DB and migrations
            \Zorachka\Infrastructure\Database\Cycle\DBAL\ConfigProvider::class,
            \Zorachka\Infrastructure\Database\Cycle\Migrations\ConfigProvider::class,

            // Logger
            \Zorachka\Infrastructure\Logger\ConfigProvider::class,

            // Send emails
            \Zorachka\Infrastructure\Mailer\ConfigProvider::class,
            \Zorachka\Infrastructure\Mailer\SwiftMailer\ConfigProvider::class,

            // Template engine an views
            \Zorachka\Infrastructure\Templer\ConfigProvider::class,
            \Zorachka\Infrastructure\Templer\Twig\Extensions\Frontend\ConfigProvider::class,
            \Zorachka\Infrastructure\Templer\Twig\ConfigProvider::class,
            \Zorachka\Infrastructure\View\ConfigProvider::class,

            // Uuid
            \Zorachka\Infrastructure\UuidProvider\ConfigProvider::class,

            // Event Dispatcher
            \Zorachka\Infrastructure\EventDispatcher\ConfigProvider::class,

            // Command bus
            \Zorachka\Infrastructure\CommandBus\Onliner\ConfigProvider::class,

            // Application
            // ... paste your providers here
            ConfigProvider::class,

            // Config (set separately later)
            new PhpFileProvider($configsPath),
            new PhpFileProvider($envConfigsPath),
        ], $cachedConfigFile);

        $builder->addDefinitions($aggregator->getMergedConfig());
//
//        dump($aggregator->getMergedConfig()['config']);
//        die();

        if ($isProduction) {
            $builder->enableCompilation($cacheConfig['container_cache_path']);
            $builder->writeProxiesToFile(true, $cacheConfig['container_proxies_cache_path']);
        }

        return $builder->build();
    }
}
