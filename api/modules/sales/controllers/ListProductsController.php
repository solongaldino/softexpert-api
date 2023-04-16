<?php

namespace Modules\Products\Controllers;

use Shared\Utils\BaseController;
use Modules\Products\UseCases\ListProductsUseCase;

class ListProductsController extends BaseController {

    private $listProductsUseCase;

    function __construct(ListProductsUseCase $listProductsUseCase){
        $this->listProductsUseCase = $listProductsUseCase;
    }

    public function handle(){
        $result = $this->listProductsUseCase->run();
        return $this->responseJson($result);
    }

}