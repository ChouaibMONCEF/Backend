<?php

header('Access-control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
$params = explode('/', $_GET['p']);

if (isset($params[0]) & !empty($params[0])) {
    $controller = ucfirst($params[0]) . "Controller";
    if (file_exists("Controller/" . $controller . ".php")) {
        require_once "Controller/" . $controller . ".php";
        $obj = new $controller();
        if (isset($params[1]) & !empty($params[1])) {
            if (method_exists($obj, $params[1])){
                $action = $params[1];

                if (isset($params[2]) & !empty($params[2])) {
                    $obj->$action($params[2]);
                }else {
                    $obj->$action();
                }
            }else {
                http_response_code(404);
                echo "this method doesn't exist";
            }
        }else {
            $action = "index";
            $obj->$action();
        }
    }else {
                http_response_code(404);
                echo "this method doesn't exist";
            }
}else {
    echo "this page";
}
