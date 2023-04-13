<?php

namespace Modules\Products\Controllers;

use Shared\Utils\BaseController;
use Modules\Products\UseCases\CreateProductUseCase;

class CreateProductController extends BaseController {

    private $createProductsUseCase;

    function __construct(CreateProductsUseCase $createProductsUseCase){
        $this->createProductsUseCase = $createProductsUseCase;
    }

    public function handle(){
        $this->createProductsUseCase->run();
    }

}