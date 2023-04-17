<?php

return [
    ["path"=> "/sales", "method"=>"POST", "controller"=> "Modules\Sales\Controllers\CreateSaleController", "action"=>"handle"],
    ["path"=> "/sales/list-all", "method"=>"GET", "controller"=> "Modules\Sales\Controllers\ListAllSalesController", "action"=>"handle"],
];