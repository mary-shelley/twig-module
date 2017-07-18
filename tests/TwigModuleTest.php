<?php
namespace Corley\TwigModule;

use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class TwigModuleTest extends TestCase
{
    public function testCreateBaseTwigService()
    {
        $module = new TwigModule([
            'templates' => __DIR__ . '/_files',
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
