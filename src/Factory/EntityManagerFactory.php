<?php
namespace Corley\DoctrineModule\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;

use Interop\Container\ContainerInterface;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $options = $container->get("doctrine-config");

        $config = Setup::createAnnotationMetadataConfiguration(
            $options["entities"],
            $options["development"],
            $options["cache"],
            null,
            false
        );

        $entityManager = EntityManager::create($options["orm"]["connection"], $config);

        return $entityManager;
    }
}
