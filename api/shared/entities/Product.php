<?php

namespace Shared\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'product')]
class Product
{
    #[ORM\Id]
    #[ORM\Column(name:'id', type:'integer', nullable:false)]
    #[ORM\GeneratedValue]
    public int $id;

    #[ORM\Column(name:'name', type:'string', length:200, nullable:false)]
    public string $name;

    #[ORM\Column(name:'value', type:'decimal', precision:8, scale:2, nullable:false)]
    public $value;

    #[ORM\Column(name:'description', type:'string', length:1000, nullable:true)]
    public $description;

    #[ORM\Column(name:'created_at', type:'datetime', nullable:false)]
    public $createdAt;

    #[ORM\Column(name:'updated_at', type:'datetime', nullable:true)]
    public $updatedAt;

    #[ORM\ManyToOne(targetEntity:'Shared\Entities\ProductType')]
    #[ORM\JoinColumn(name: 'product_type', referencedColumnName: 'id')]
    public $productType;

    public function getId(): int|null
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getValue(){
        return $this->value;
    }

    public function setValue($value){
        $this->value = $value;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    } 

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): \DateTime | null
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getProductType(): ProductType
    {
        return $this->productType;
    }

    public function setProductType($productType): void
    {
        $this->productType = $productType;
    }


}
