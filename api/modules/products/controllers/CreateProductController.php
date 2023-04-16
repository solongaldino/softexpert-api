<?php

namespace Modules\Products\Controllers;

use Modules\Products\Dtos\CreateProductDTO;
use Shared\Utils\BaseController;
use Modules\Products\UseCases\CreateProductUseCase;
use Shared\Utils\ApiError;

class CreateProductController extends BaseController {

    private $createProductUseCase;

    function __construct(CreateProductUseCase $createProductUseCase){
        $this->createProductUseCase = $createProductUseCase;
    }

    public function handle(){
        try {

            $body = $this->getBody();
            
            $data = new CreateProductDTO($body);

            $result = $this->createProductUseCase->run($data);

            $this->responseJson($result);

        } catch (\Throwable $th) {
            new ApiError(400, $th->getMessage());
        }
        
    }

}