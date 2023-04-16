<?php

namespace Shared\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'taxe')]
class Taxe
{
    #[ORM\Id]
    #[ORM\Column(name:'id', type:'integer', nullable:false)]
    #[ORM\GeneratedValue]
    public int $id;

    #[ORM\Column(name:'name', type:'string', length:200, nullable:false)]
    public string $name;

    #[ORM\Column(name:'percentage', type:'decimal', precision:8, scale:2, nullable:false)]
    public $percentage;

    #[ORM\Column(name:'created_at', type:'datetime', nullable:false)]
    public $createdAt;

    #[ORM\Column(name:'updated_at', type:'datetime', nullable:true)]
    public $updatedAt;

    #[ORM\ManyToMany(targetEntity:'Shared\Entities\ProductType', mappedBy:'taxe')]
    public $productType = array();

    public function __construct()
    {
        $this->productType = new Collection();
    }

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

    public function getPercentage()
    {
        return $this->percentage;
    }

    public function setPercentage($percentage): void
    {
        $this->percentage = $percentage;
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

    public function getProductType(): Collection
    {
        return $this->productType;
    }

}
