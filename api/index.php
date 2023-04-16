<?php

namespace Softexpert\Api;

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';
require_once 'config/autoload-class.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/');
$dotenv->load();

use Shared\Utils\Router;

$modules = ["products", "products-type", "taxes", "sales"];

$router = new Router($modules);
$router->run();