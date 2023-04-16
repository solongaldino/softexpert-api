<?php

namespace Modules\Products\Dtos;

class CreateProductDTO {
    
    private Int $productTypeId;
    
    private String $name;

    private Float $value;

    private String $description;

    function __construct(Array $data){
        $this->productTypeId = $data['productTypeId'];
        $this->name = $data['name'];
        $this->value = $data['value'];
        $this->description = $data['description'];
    }

    public function getProductTypeId(): Int
    {
        return $this->productTypeId;
    }

    public function getName(): String
    {
        return $this->name;
    }

    public function getValue(): Float
    {
        return $this->value;
    }

    public function getDescription(): String|null
    {
        return $this->description;
    }

    
}