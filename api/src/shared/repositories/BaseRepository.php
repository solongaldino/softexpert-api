<?php

namespace Shared\Repositories;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class BaseRepository{
    
    private $entityManager;

    function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    public function getEntityManager(){
        return $this->entityManager;
    }

}