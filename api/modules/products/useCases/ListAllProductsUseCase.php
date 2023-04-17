<?php

namespace Modules\Products\UseCases;

use Shared\Repositories\BaseRepository;
use Shared\Entities\Product;

class ListAllProductsUseCase{

    private $baseRepository;

    function __construct(BaseRepository $baseRepository){
        $this->baseRepository = $baseRepository;
    }

    public function run(){
        return $this->baseRepository->findAll(Product::class);
    }
}