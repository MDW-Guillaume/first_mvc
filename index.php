<?php
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
session_start();
// display_errors();

// var_dump($_GET, $_SERVER['SCRIPT_FILENAME']);
if(isset($_GET['action']) && !empty($_GET['action'])){
    $params = explode('/', $_GET['action']);
    if($params[0] != ""){
        $controller = $params[0];
        $action = isset($params[1]) ? $params[1] : 'index';
        $controllerFile = ROOT . 'controllers/'.$controller.'Controller.php';
        
        if(file_exists($controllerFile)){
            require_once($controllerFile);

            if(function_exists($action)){
                if(isset($params[2]) && isset($params[3])){
                    $action($params[2], $params[3]);
                }elseif (isset($params[2])){
                    $action($params[2]);
                }else{
                    $action();
                }
            }else{
                header('HTTP/1.0 404 Not Found');
                require_once('views/errors/404.html');
            }
        }else{
            header('HTTP/1.0 404 Not Found');
            require_once('views/errors/404.html');
        }
    }
} else {
    if(isset($_SESSION['email'])){
        require_once('controllers/homeController.php');
        index();
    }else{
        require_once('controllers/landingController.php');
        index();
    }
}