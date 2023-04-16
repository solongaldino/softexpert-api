<?php

namespace Modules\ProductsType\Controllers;

use Shared\Utils\BaseController;
use Modules\ProductsType\Dtos\CreateProductTypeDTO;
use Modules\ProductsType\UseCases\CreateProductTypeUseCase;
use Shared\Utils\ApiError;

class CreateProductTypeController extends BaseController {

    private $createProductTypeUseCase;

    function __construct(CreateProductTypeUseCase $createProductTypeUseCase){
        $this->createProductTypeUseCase = $createProductTypeUseCase;
    }

    public function handle(){
        try {

            $body = $this->getBody();
            
            $data = new CreateProductTypeDTO($body);

            $result = $this->createProductTypeUseCase->run($data);

            $this->responseJson($result);

        } catch (\Throwable $th) {
            new ApiError(400, $th->getMessage());
        }
        
    }

}