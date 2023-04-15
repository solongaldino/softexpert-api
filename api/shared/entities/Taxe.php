<?php

namespace Shared\Entities;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'taxe')]
class Taxe
{
    #[ORM\Id]
    #[ORM\Column(name:'id', type:'integer', nullable:'false')]
    #[ORM\GeneratedValue]
    public int $id;

    #[ORM\Column(type: 'string')]
    public string $name;

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

}
