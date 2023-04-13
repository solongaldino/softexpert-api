<?php

namespace Shared\Factories;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerFactory{

    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */    
    public function getEntityManager(): EntityManagerInterface
    {
        
        $paths = [__DIR__ .'/../entities'];
        
        $isDevMode = false;

        $dbParams = [
            'driver'   => 'pdo_mysql',
            'user'     => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'],
            'dbname'   => $_ENV['DB_NAME'],
        ];

        $config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);    
        $connection = DriverManager::getConnection($dbParams, $config);
        
        return new EntityManager($connection, $config);
    }
}