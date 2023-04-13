<?php

namespace Modules\Products\UseCases;

use Shared\Repositories\BaseRepository;

class ListProductsUseCase{

    private $baseRepository;

    function __construct(BaseRepository $baseRepository){
        $this->baseRepository = $baseRepository;
    }

    public function run(){
        

        
        var_dump($this->baseRepository->getEntityManager());
        return ["message"=> "Olá mundo", "type"=>"test"];
    }
}