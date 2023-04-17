<?php

namespace Modules\Taxes\Controllers;

use Shared\Utils\BaseController;
use Modules\Taxes\UseCases\ListAllTaxesUseCase;
use Shared\Utils\ApiError;

class ListAllTaxesController extends BaseController {

    private $listAllTaxesUseCase;

    function __construct(ListAllTaxesUseCase $listAllTaxesUseCase){
        $this->listAllTaxesUseCase = $listAllTaxesUseCase;
    }

    public function handle(){

        try {
        
            $result = $this->listAllTaxesUseCase->run();

            $this->responseJson($result);

        } catch (\Throwable $th) {
            new ApiError(400, $th->getMessage());
        }

    }

}