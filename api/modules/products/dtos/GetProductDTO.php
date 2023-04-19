<?php

namespace Modules\Products\Dtos;

class GetProductDTO {
    
    private Int $id;

    function __construct(Array $data){
        $this->id = $data['id'];
    }

    public function getId(): Int
    {
        return $this->id;
    }    
}