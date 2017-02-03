<?php

namespace SecurityModule\Factory\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class LoginControllerFactory implements FactoryInterface {

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $authService = $container->get('securetymodule.authservice');

        return new \SecurityModule\Controller\LoginController($authService);
    }

}
