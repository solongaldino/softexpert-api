<?php

return [
    ["path"=> "/taxes", "method"=>"GET", "controller"=> "Modules\Taxes\Controllers\ListTaxesController", "action"=>"handle"],
    ["path"=> "/taxes", "method"=>"POST", "controller"=> "Modules\Taxes\Controllers\CreateTaxeController", "action"=>"handle"],
];