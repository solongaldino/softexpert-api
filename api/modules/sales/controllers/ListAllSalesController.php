<?php

namespace Modules\Sales\Controllers;

use Shared\Utils\BaseController;
use Modules\Sales\UseCases\ListAllSalesUseCase;
use Shared\Utils\ApiError;

class ListAllSalesController extends BaseController {

    private $listAllSalesUseCase;

    function __construct(ListAllSalesUseCase $listAllSalesUseCase){
        $this->listAllSalesUseCase = $listAllSalesUseCase;
    }

    public function handle(){
        try {
        
            $result = $this->listAllSalesUseCase->run();
            return $this->responseJson($result);

        } catch (\Throwable $th) {
            new ApiError(400, $th->getMessage());
        }
        
    }

}