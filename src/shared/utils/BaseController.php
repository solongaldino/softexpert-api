<?php

namespace Shared\Utils;

class BaseController {

    private $body, $query, $params, $method;

    function __construct(){
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    function getBody(){
        return $this->body;
    }

    function getQuery(){
        return $this->query;
    }

    function getParams(){
        return $this->params;
    }

    function getMethod(){
        return $this->method;
    }

}