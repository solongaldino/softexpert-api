<?php

spl_autoload_register(function ($classFullName){

    $resouces = array_merge(
        include 'modules/products/resouces.php',
        include 'modules/taxes/resouces.php',
    );

    foreach ($resouces as $key => $resouce) {

        $path = str_replace($resouce['namespace'], $resouce['path'], $classFullName) . '.php';

        if (file_exists($path) && !is_dir($path)) {
            include $path;
        }
    }    
    
});

