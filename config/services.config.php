<?php
namespace SecurityModule;

return [
    'factories' => [
        Adapter\Doctrine::class => Factory\Adapter\DoctrineAdapterFactory::class,
        'securetymodule.authservice' => Factory\Services\AuthServiceFactory::class,
    ],
    'aliases' => [
        \Zend\Authentication\AuthenticationService::class => 'securetymodule.authservice',
    ]
];
