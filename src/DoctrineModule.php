<?php
namespace Corley\DoctrineModule;

use Corley\Modular\Module\ModuleInterface;
use Zend\ServiceManager\ServiceManager;
use Psr\Container\ContainerInterface;

class DoctrineModule implements ModuleInterface
{
    public function __construct(array $options = [])
    {
        $this->options = array_replace_recursive([
            "orm" =>  [
                "connection" => [
                ],
            ],
            "entities" => ["/tmp"],
            "development" => true,
            "cache" => "/tmp",
        ], $options);
    }

    public function getContainer()
    {
        $conf = include __DIR__ . '/../configs/services.php';

        $serviceManager = new ServiceManager();
        $serviceManager->configure($conf["services"]);
        $serviceManager->setService("doctrine-config", $this->options);

        return $serviceManager;
    }
}
