<?php

namespace Modules\ProductsType\Controllers;

use Shared\Utils\BaseController;
use Modules\ProductsType\UseCases\ListAllProductsTypeUseCase;
use Shared\Utils\ApiError;

class ListAllProductsTypeController extends BaseController {

    private $listAllProductsTypeUseCase;

    function __construct(ListAllProductsTypeUseCase $listAllProductsTypeUseCase){
        $this->listAllProductsTypeUseCase = $listAllProductsTypeUseCase;
    }

    public function handle(){
        try {
        
            $result = $this->listAllProductsTypeUseCase->run();
            return $this->responseJson($result);

        } catch (\Throwable $th) {
            new ApiError(400, $th->getMessage());
        }
        
    }

}