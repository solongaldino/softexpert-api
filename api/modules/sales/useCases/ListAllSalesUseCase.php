<?php

namespace Modules\Sales\UseCases;

use Shared\Repositories\BaseRepository;
use Shared\Entities\Sale;

class ListAllSalesUseCase{

    private $baseRepository;

    function __construct(BaseRepository $baseRepository){
        $this->baseRepository = $baseRepository;
    }

    public function run(){
        return $this->baseRepository->findAll(Sale::class);
    }
}