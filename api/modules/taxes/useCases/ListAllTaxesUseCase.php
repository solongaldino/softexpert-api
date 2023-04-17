<?php

namespace Modules\Taxes\UseCases;

use Shared\Repositories\BaseRepository;
use Shared\Entities\Taxe;

class ListAllTaxesUseCase{

    private $baseRepository;

    function __construct(BaseRepository $baseRepository){
        $this->baseRepository = $baseRepository;
    }

    public function run(){
        return $this->baseRepository->findAll(Taxe::class);
    }
}