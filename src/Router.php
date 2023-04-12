<?php

namespace Softexpert\Api;

class Router
{
  public $routes = array();
  public $modules = array();

  public function __construct(Array $modules){
    $this->modules = $modules;
    $this->routes = $this->getRoutes();
    $this->executeRequestRoute();
  }

  private function getRoutes(){
    $routes = array();
    foreach ($this->modules as $key => $value) {
      $moduleRoutes = include __DIR__ . '/modules/'.$value.'/routes.php';
      foreach ($moduleRoutes as $key => $value) {
        array_push($routes, $value);
      }
    }
    return $routes;    
  }

  private function executeRequestRoute(){
    foreach ($this->routes as $key => $value) {
      if($_SERVER['REQUEST_URI'] === $value['path'] && $_SERVER['REQUEST_METHOD'] === $value['method']){

        $controllerNamespace = '\\'.$value['controller'];

        $controller = new $controllerNamespace();
        
        $controller->{$value['action']}();
        
      }
    }
  }
}
