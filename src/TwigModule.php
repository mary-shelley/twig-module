<?php
namespace Corley\TwigModule;

use Corley\Modular\Module\ModuleInterface;
use Zend\ServiceManager\ServiceManager;
use Psr\Container\ContainerInterface;

class TwigModule implements ModuleInterface
{
    public function __construct(array $options = [])
    {
        $this->options = array_replace_recursive([
            'templates' => __DIR__,
            'options' => [
                'cache' => "/tmp",
                'debug' => true,
            ],
        ], $options);
    }

    public function getContainer()
    {
        $conf = include __DIR__ . '/../configs/services.php';

        $serviceManager = new ServiceManager();
        $serviceManager->configure($conf["services"]);
        $serviceManager->setService("twig-config", $this->options);

        return $serviceManager;
    }
}
