<?php

namespace Modules\ProductsType\UseCases;

use Shared\Repositories\BaseRepository;
use Shared\Entities\ProductType;

class ListAllProductsTypeUseCase{

    private $baseRepository;

    function __construct(BaseRepository $baseRepository){
        $this->baseRepository = $baseRepository;
    }

    public function run(){
        return $this->baseRepository->findAll(ProductType::class);
    }
}