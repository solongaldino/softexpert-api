<?php

namespace Softexpert\Api;
require_once '../vendor/autoload.php';
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

$modules = ["products", "taxes"];

require_once 'autoload.php';

new Router($modules);