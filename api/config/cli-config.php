#!/usr/bin/env php
<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Shared\Factories\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'autoload-class.php';

$entityManagerFactory = new EntityManagerFactory();

ConsoleRunner::run(
    new SingleManagerProvider($entityManagerFactory->getEntityManager())
);