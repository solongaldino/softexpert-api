<?php

use DI\ContainerBuilder;
use Shared\Factories\EntityManagerFactory;
use Doctrine\ORM\EntityManagerInterface;

$builder = new ContainerBuilder();

$builder->addDefinitions([
    EntityManagerInterface::class => function () {
        return (new EntityManagerFactory())->getEntityManager();
    }
]);

$container = $builder->build();

return $container;
