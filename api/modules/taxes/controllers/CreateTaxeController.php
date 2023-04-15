<?php

namespace Modules\Taxes\Controllers;

use Modules\Taxes\Dtos\CreateTaxeDTO;
use Shared\Utils\BaseController;
use Modules\Taxes\UseCases\CreateTaxeUseCase;
use Shared\Utils\ApiError;

class CreateTaxeController extends BaseController {

    private $createTaxeUseCase;

    function __construct(CreateTaxeUseCase $createTaxeUseCase){
        $this->createTaxeUseCase = $createTaxeUseCase;
    }

    public function handle(){

        try {

            $body = $this->getBody();
            
            $data = new CreateTaxeDTO($body);

            $result = $this->createTaxeUseCase->run($data);

            $this->responseJson($result);

        } catch (\Throwable $th) {
            
            new ApiError(400, $th->getMessage());
        }
    }

}