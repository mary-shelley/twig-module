<?php
namespace Corley\DoctrineModule;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

use Doctrine\ORM\EntityManager;

class DoctrineModuleTest extends TestCase
{
    public function testCreateBaseDoctrineService()
    {
        $module = new DoctrineModule([
            "orm" =>  [
                "connection" => [
                    'driver' => 'pdo_sqlite',
                    'path' => __DIR__ . '/_files',
                ],
            ],
            "entities" => [__DIR__ . "_files/"],
            "development" => true,
            "cache" => "/tmp",
        ]);

        $container = $module->getContainer();

        $this->assertInstanceOf(ContainerInterface::class, $container);
        $this->assertTrue($container->has("orm"));
        $this->assertInstanceOf(EntityManager::class, $container->get("orm"));
    }
}
