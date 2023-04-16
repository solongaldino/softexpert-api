<?php

namespace Shared\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'sale')]
class Sale
{
    #[ORM\Id]
    #[ORM\Column(name:'id', type:'integer', nullable:false)]
    #[ORM\GeneratedValue]
    public int $id;

    #[ORM\Column(name:'amount', type:'decimal', precision:8, scale:2, nullable:true)]
    public $amount;

    #[ORM\Column(name:'taxe', type:'decimal', precision:8, scale:2, nullable:true)]
    public $taxe;

    #[ORM\Column(name:'created_at', type:'datetime', nullable:false)]
    public $createdAt;

    public function getId(): int|null
    {
        return $this->id;
    }

    public function getAmount(){
        return $this->amount;
    }

    public function setAmount($amount){
        $this->amount = $amount;
    }

    public function getTaxe(){
        return $this->taxe;
    }

    public function setTaxe($taxe){
        $this->taxe = $taxe;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
