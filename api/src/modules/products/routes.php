<?php

return [
    ["path"=> "/products", "method"=>"POST", "controller"=> "Modules\Products\Controllers\CreateProductController", "action"=>"handle"],
    ["path"=> "/products", "method"=>"GET", "controller"=> "Modules\Products\Controllers\ListProductsController", "action"=>"handle"],
];