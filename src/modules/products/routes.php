<?php

return [
    ["path"=> "/products", "method"=>"GET", "controller"=> "Modules\Products\Controllers\ProductController", "action"=>"list"],
    ["path"=> "/products", "method"=>"POST", "controller"=> "Modules\Products\Controllers\ProductController", "action"=>"create"],
];