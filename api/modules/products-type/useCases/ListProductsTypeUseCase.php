<?php

namespace Modules\ProductsType\UseCases;

use Shared\Repositories\BaseRepository;

class ListProductsTypeUseCase{

    private $baseRepository;

    function __construct(BaseRepository $baseRepository){
        $this->baseRepository = $baseRepository;
    }

    public function run(){
        return ["message"=> "Olá mundo", "type"=>"test"];
    }
}