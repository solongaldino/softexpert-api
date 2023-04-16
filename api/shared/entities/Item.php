<?php

namespace Shared\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'item')]
class Item
{
    #[ORM\Id]
    #[ORM\Column(name:'id', type:'integer', nullable:false)]
    #[ORM\GeneratedValue]
    public int $id;

    #[ORM\Column(name:'amount', type:'integer', nullable:false)]
    public $amount;

    #[ORM\ManyToOne(targetEntity:'Shared\Entities\Sale')]
    #[ORM\JoinColumn(name: 'sale', referencedColumnName: 'id')]
    public $sale;

    #[ORM\ManyToOne(targetEntity:'Shared\Entities\Product')]
    #[ORM\JoinColumn(name: 'product', referencedColumnName: 'id')]
    public $product;

    public function getId(): int|null
    {
        return $this->id;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    public function getSale(): Sale
    {
        return $this->sale;
    }

    public function setSale($sale): void
    {
        $this->sale = $sale;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct($product): void
    {
        $this->product = $product;
    }


}
