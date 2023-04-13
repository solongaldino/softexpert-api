<?php

namespace Shared\Utils;

class BaseController {

    private $body, $query, $params, $method;

    function __construct(){
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function getBody(){
        return $this->body;
    }

    public function getQuery(){
        return $this->query;
    }

    public function getParams(){
        return $this->params;
    }

    public function getMethod(){
        return $this->method;
    }

    public function responseJson(Array $data, Int $statusCode = 200){
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code($statusCode);
        echo json_encode($data);
        exit();
    }

}