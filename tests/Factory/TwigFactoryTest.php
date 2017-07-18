<?php
namespace Corley\TwigModule\Factory;

use PHPUnit\Framework\TestCase;

use Corley\TwigModule\TwigModule;
use Psr\Container\ContainerInterface;

class TwigFactoryTest extends TestCase
{
    public function testCreate()
    {
        $module = new TwigModule([
            'templates' => __DIR__ . '/../_files',
            'options' => [
                'cache' => '/tmp',
                'debug' => true,
            ],
        ]);
        $container = $module->getContainer();

        $this->assertInstanceOf(ContainerInterface::class, $container);
        $this->assertTrue($container->has("twig"));
        $this->assertInstanceOf(\Twig_Environment::class, $container->get("twig"));
    }
}
