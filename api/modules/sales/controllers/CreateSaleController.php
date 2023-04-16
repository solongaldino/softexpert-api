<?php

namespace Modules\Sales\Controllers;

use Modules\Sales\Dtos\CreateSaleDTO;
use Shared\Utils\BaseController;
use Modules\Sales\UseCases\CreateSaleUseCase;
use Shared\Utils\ApiError;

class CreateSaleController extends BaseController {

    private $createSaleUseCase;

    function __construct(CreateSaleUseCase $createSaleUseCase){
        $this->createSaleUseCase = $createSaleUseCase;
    }

    public function handle(){
        try {

            $body = $this->getBody();
            
            $data = new CreateSaleDTO($body);

            $result = $this->createSaleUseCase->run($data);

            $this->responseJson($result, 201);

        } catch (\Throwable $th) {
             new ApiError(400, $th->getMessage());
        }
        
    }

}