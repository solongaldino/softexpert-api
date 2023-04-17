<?php

return [
    ["path"=> "/taxes", "method"=>"POST", "controller"=> "Modules\Taxes\Controllers\CreateTaxeController", "action"=>"handle"],
    ["path"=> "/taxes/list-all", "method"=>"GET", "controller"=> "Modules\Taxes\Controllers\ListAllTaxesController", "action"=>"handle"],
];