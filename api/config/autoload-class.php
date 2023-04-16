<?php

spl_autoload_register(function ($classFullName){

    $resouces = array_merge(
        include __DIR__ . '/../modules/products/resouces.php',
        include __DIR__ . '/../modules/products-type/resouces.php',
        include __DIR__ . '/../modules/sales/resouces.php',
        include __DIR__ . '/../modules/taxes/resouces.php',
        include __DIR__ . '/../shared/resouces.php',
    );

    foreach ($resouces as $key => $resouce) {

        $path = str_replace($resouce['namespace'], $resouce['path'], $classFullName) . '.php';

        if (file_exists($path) && !is_dir($path)) {
            include $path;
        }
    }    
    
});

