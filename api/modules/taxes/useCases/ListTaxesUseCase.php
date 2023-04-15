<?php

namespace Modules\Taxes\UseCases;

use Shared\Repositories\BaseRepository;

class ListTaxesUseCase{

    private $baseRepository;

    function __construct(BaseRepository $baseRepository){
        $this->baseRepository = $baseRepository;
    }

    public function run(){
        return ["message"=> "ListTaxesUseCase", "type"=>"test"];
    }
}