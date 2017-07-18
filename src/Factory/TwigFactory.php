<?php
namespace Corley\TwigModule\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;

use Interop\Container\ContainerInterface;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class TwigFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $options = $container->get("twig-config");

        $loader = new \Twig_Loader_Filesystem($options['templates']);
        $twig = new \Twig_Environment($loader, $options['options']);

        return $twig;
    }
}
