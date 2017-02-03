<?php

namespace SecurityModule\Factory\Services;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Authentication\Storage\Session;

class AuthServiceFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $storage = new Session('SecurityModule');
        $adapter = $container->get(\SecurityModule\Adapter\Doctrine::class);
        
        $authServices = new \Zend\Authentication\AuthenticationService($storage, $adapter);
        return $authServices;
    }

}
