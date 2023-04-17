<?php

namespace Shared\Repositories;

use Doctrine\ORM\EntityManagerInterface;

class BaseRepository {
    
    private $entityManager;

    function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    public function getEntityManager(){
        return $this->entityManager;
    }

    public function findById($entity, $id)
    {
        return $this->getEntityManager()->getRepository($entity)->find($id);
    }

    public function findAll($entity)
    {
        return $this->getEntityManager()->getRepository($entity)->findAll();
    }

    public function save($e){
        try{
            $this->getEntityManager()->persist($e);
            $this->getEntityManager()->flush();
        }catch (\Exception $ex){
            throw $ex;
        } return $e;
    }

}