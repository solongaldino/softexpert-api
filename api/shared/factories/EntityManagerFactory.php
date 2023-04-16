<?php

namespace Shared\Factories;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Tools\DsnParser;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AttributeDriver;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\PhpFilesAdapter;

class EntityManagerFactory{

    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */    
    public function getEntityManager(): EntityManagerInterface
    {
                
        $applicationMode = "development";

        if ($applicationMode == "development") {
            $queryCache = new ArrayAdapter();
            $metadataCache = new ArrayAdapter();
        } else {
            $queryCache = new PhpFilesAdapter('doctrine_queries');
            $metadataCache = new PhpFilesAdapter('doctrine_metadata');
        }
        
        $config = new Configuration();
        $config->setMetadataCache($metadataCache);
        $driverImpl = new AttributeDriver([__DIR__ .'/../entities']);
        $config->setMetadataDriverImpl($driverImpl);
        $config->setQueryCache($queryCache);
        $config->setProxyDir('data/DoctrineORMModule/Proxy');
        $config->setProxyNamespace('Doctrine\Proxies');
        
        if ($applicationMode == "development") {
            $config->setAutoGenerateProxyClasses(true);
        } else {
            $config->setAutoGenerateProxyClasses(false);
        }



        $dsnParser = new DsnParser(['mysql' => 'mysqli', 'postgresql' => 'pgsql']); //https://www.doctrine-project.org/projects/doctrine-dbal/en/current/reference/configuration.html
        $connectionParams = $dsnParser->parse('postgresql://postgres:postgres@postgres:5432/api');
                
        $connection = DriverManager::getConnection($connectionParams, $config);
        
        return new EntityManager($connection, $config);
    }
}