<?php

return [
    ["path"=> "/sales", "method"=>"POST", "controller"=> "Modules\Sales\Controllers\CreateSaleController", "action"=>"handle"],
    ["path"=> "/sales", "method"=>"GET", "controller"=> "Modules\Sales\Controllers\ListSalesController", "action"=>"handle"],
];