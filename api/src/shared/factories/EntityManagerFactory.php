<?php

namespace Shared\Factories;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Tools\DsnParser;
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

        $dsnParser = new DsnParser(['mysql' => 'mysqli', 'postgresql' => 'pgsql']); //https://www.doctrine-project.org/projects/doctrine-dbal/en/current/reference/configuration.html
        $connectionParams = $dsnParser->parse('postgresql://postgres:postgres@localhost:5433/api');
        $config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
        $connection = DriverManager::getConnection($connectionParams, $config);
        
        return new EntityManager($connection, $config);
    }
}