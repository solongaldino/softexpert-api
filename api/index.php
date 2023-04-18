<?php

header('Access-Control-Allow-Origin', '*');
header('Access-Control-Allow-Methods', '*');
header('Access-Control-Allow-Headers', '*');
header('Access-Control-Max-Age', '86400');

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';
require_once 'config/autoload-class.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/');
$dotenv->load();

use Shared\Utils\Router;

$modules = ["products", "products-type", "taxes", "sales"];

try {
    $router = new Router($modules);
    $router->run();
} catch (\Throwable $th) {
    throw $th;
}
