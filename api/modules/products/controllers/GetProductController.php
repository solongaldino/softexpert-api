<?php

namespace Modules\Products\Controllers;

use Modules\Products\Dtos\GetProductDTO;
use Shared\Utils\BaseController;
use Modules\Products\UseCases\GetProductUseCase;
use Shared\Utils\ApiError;

class GetProductController extends BaseController {

    private $getProductUseCase;

    function __construct(GetProductUseCase $getProductUseCase){
        $this->getProductUseCase = $getProductUseCase;
    }

    public function handle(){
        try {

            $query = $this->getQuery();

            $result = $this->getProductUseCase->run(new GetProductDTO(['id'=>$query['id']]));

            $this->responseJson($result);

        } catch (\Throwable $th) {
            new ApiError(400, $th->getMessage());
        }
        
    }

}