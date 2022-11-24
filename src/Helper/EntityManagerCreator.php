<?php

namespace Fabio\Doctrine\Helper;

use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Cache\Adapter\PhpFilesAdapter;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__ . "/.."],
            isDevMode: true,
        );

        $consoleOutput = new ConsoleOutput(ConsoleOutput::VERBOSITY_DEBUG);
        $consoleLogger = new ConsoleLogger($consoleOutput);
        $loggerMiddleware = new Middleware($consoleLogger);

        $config->setMiddlewares([$loggerMiddleware]);

        $cacheDirectory = __DIR__ . '/../../var/cache';
        $config->setMetadataCache(
            new PhpFilesAdapter(
                namespace :'metada_cache',
                directory: $cacheDirectory
            )
        );

        $config->setQueryCache(
            new PhpFilesAdapter(
                namespace: 'query_cache',
                directory: $cacheDirectory
            )
        );

        $conn = [
            'driver' => 'pdo_mysql',
            'host' => '127.0.0.1',
            'dbname' => 'Student',
            'user' => 'root',
            'password' => 'root'
        ];

        return EntityManager::create($conn, $config);
    }
}