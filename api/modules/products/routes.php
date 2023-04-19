<?php

return [
    ["path"=> "/products", "method"=>"POST", "controller"=> "Modules\Products\Controllers\CreateProductController", "action"=>"handle"],
    ["path"=> "/products/list-all", "method"=>"GET", "controller"=> "Modules\Products\Controllers\ListAllProductsController", "action"=>"handle"],
    ["path"=> "/products", "method"=>"GET", "controller"=> "Modules\Products\Controllers\GetProductController", "action"=>"handle"],
];