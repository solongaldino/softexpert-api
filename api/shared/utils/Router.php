<?php

namespace Shared\Utils;

class Router
{
  public $routes = array();
  public $modules = array();
  private $container;

  public function __construct(Array $modules){
    $this->modules = $modules;
    $this->routes = $this->getRoutes();
    $this->container = include __DIR__ . '/../../config/dependency-injection.php';
  }

  private function getRoutes(){
    $routes = array();
    foreach ($this->modules as $key => $value) {
      $moduleRoutes = include __DIR__ . '/../../modules/'.$value.'/routes.php';
      foreach ($moduleRoutes as $key => $value) {
        array_push($routes, $value);
      }
    }
    return $routes;    
  }

  public function run(){

    $amountRoutes = count($this->routes);
    
    foreach ($this->routes as $value) {

      $amountRoutes--;

      $path = explode("?",$_SERVER['REQUEST_URI']);

      if($path[0] === $value['path']){

        if($_SERVER['REQUEST_METHOD'] === $value['method']){

          $controllerNamespace = '\\'.$value['controller'];

          $controller = $this->container->get($controllerNamespace);
        
          $controller->{$value['action']}();

        }else{
          if($amountRoutes <=0){
            new ApiError(404, "Method not found");
          }
        }
 
      }elseif($_SERVER['REQUEST_URI'] === "/status"){
        echo "<h1>Api status ok!</h1>";
        die();
      }else{
        
        if($amountRoutes <=0){
          new ApiError(404, "Url not found");
        }
        
      }
    }
  }
}
