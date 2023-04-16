<?php

namespace Modules\Sales\Dtos;

class CreateSaleDTO {
    
    private Array $list;

    function __construct(Array $data){
        $this->list = $data['list'];
    }

    public function getList(): Array
    {
        return $this->list;
    }

    
}