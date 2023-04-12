<?php
namespace Softexpert\Api;

class Router
{
  public $routes = array();
  public $modules = array();

  public function __construct(Array $modules)
  {
    $this->modules = $modules;
    $this->routes = $this->getRoutes();
  }

  private function getRoutes()
  {

    $routes = array();

    foreach ($this->modules as $key => $value) {
      array_push($routes, include __DIR__ . '/modules/'.$value.'/routes.php');
    }

    print_r($routes);
    
    return $routes;
    
  }
}
