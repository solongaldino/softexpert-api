<?php

namespace Modules\ProductsType\Dtos;

class CreateProductTypeDTO {
    
    private String $name;
    
    private Int $taxeId;

    function __construct(Array $data){
        $this->name = $data['name'];
        $this->taxeId = $data['taxeId'];
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function getTaxeId(): Int
    {
        return $this->taxeId;
    }
}