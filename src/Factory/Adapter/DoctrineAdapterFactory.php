<?php 

namespace SecurityModule\Factory\Adapter;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;


class DoctrineAdapterFactory implements FactoryInterface
{
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
	{
                $em = $container->get('doctrine.entitymanager.orm_default');
		return new \SecurityModule\Adapter\Doctrine($em);
	}
}