<?php

namespace Modules\Taxes\Dtos;

class CreateTaxeDTO {
    
    private String $name;
    
    private Float $percentage;

    function __construct(Array $data){
        $this->name = $data['name'];
        $this->percentage = $data['percentage'];
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function getPercentage(): Float
    {
        return $this->percentage;
    }
}