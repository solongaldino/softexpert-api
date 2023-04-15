<?php

namespace Modules\Taxes\Controllers;

use Shared\Utils\BaseController;
use Modules\Taxes\UseCases\ListTaxesUseCase;

class ListTaxesController extends BaseController {

    private $listTaxesUseCase;

    function __construct(ListTaxesUseCase $listTaxesUseCase){
        $this->listTaxesUseCase = $listTaxesUseCase;
    }

    public function handle(){
        $result = $this->listTaxesUseCase->run();
        $this->responseJson($result);
    }

}