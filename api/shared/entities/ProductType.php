<?php

namespace Shared\Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass:'Shared\Repositories\ProductTypeReposity')]
#[ORM\Table(name: 'product_type')]
class ProductType
{
    #[ORM\Id]
    #[ORM\Column(name:'id', type:'integer', nullable:false)]
    #[ORM\GeneratedValue]
    public int $id;

    #[ORM\Column(name:'name', type:'string', length:200, nullable:false)]
    public string $name;

    #[ORM\Column(name:'created_at', type:'datetime', nullable:false)]
    public $createdAt;

    #[ORM\Column(name:'updated_at', type:'datetime', nullable:true)]
    public $updatedAt;

    #[ORM\ManyToMany(targetEntity:'Shared\Entities\Taxe', inversedBy:'productType')]
    #[ORM\JoinTable(name: 'product_type_has_taxe')]
    #[ORM\JoinColumn(name: 'product_type_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'taxe_id', referencedColumnName: 'id')]
    public $taxe = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->taxe = new ArrayCollection();
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

    public function getTaxe(): ArrayCollection
    {
        return $this->taxe;
    }

    public function setTaxe($taxe): void
    {
        $this->taxe = $taxe;
    }

}
