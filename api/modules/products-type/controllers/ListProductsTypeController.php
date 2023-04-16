<?php

namespace Modules\ProductsType\Controllers;

use Shared\Utils\BaseController;
use Modules\ProductsType\UseCases\ListProductsTypeUseCase;

class ListProductsTypeController extends BaseController {

    private $listProductsTypeUseCase;

    function __construct(ListProductsTypeUseCase $listProductsTypeUseCase){
        $this->listProductsTypeUseCase = $listProductsTypeUseCase;
    }

    public function handle(){
        $result = $this->listProductsTypeUseCase->run();
        return $this->responseJson($result);
    }

}