<?php
namespace Corley\DoctrineModule\Factory;

use PHPUnit\Framework\TestCase;

use Doctrine\ORM\EntityManager;
use Corley\DoctrineModule\DoctrineModule;
use Psr\Container\ContainerInterface;

class EntityManagerFactoryTest extends TestCase
{
    public function testCreateEntityManager()
    {
        $module = new DoctrineModule([
            "orm" =>  [
                "connection" => [
                    'driver' => 'pdo_sqlite',
                    'path' => __DIR__ . '/../_files',
                ],
            ],
            "entities" => [__DIR__ . "/../_files"],
            "development" => true,
            "cache" => "/tmp",
        ]);
        $container = $module->getContainer();

        $this->assertInstanceOf(ContainerInterface::class, $container);
        $this->assertTrue($container->has("orm"));
        $this->assertInstanceOf(EntityManager::class, $container->get("orm"));
    }
}
