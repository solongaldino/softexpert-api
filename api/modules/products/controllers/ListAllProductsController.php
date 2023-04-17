<?php

namespace Modules\Products\Controllers;

use Shared\Utils\BaseController;
use Modules\Products\UseCases\ListAllProductsUseCase;
use Shared\Utils\ApiError;

class ListAllProductsController extends BaseController {

    private $listAllProductsUseCase;

    function __construct(ListAllProductsUseCase $listAllProductsUseCase){
        $this->listAllProductsUseCase = $listAllProductsUseCase;
    }

    public function handle(){
        
        try {
        
            $result = $this->listAllProductsUseCase->run();
            return $this->responseJson($result);

        } catch (\Throwable $th) {
            new ApiError(400, $th->getMessage());
        }
    }

}