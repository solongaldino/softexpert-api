<?php

namespace Shared\Utils;

class ApiError{
    function __construct(Int $statusCode, String $message){
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code($statusCode);
        echo json_encode(["message"=>$message]);
        exit();
    }
}