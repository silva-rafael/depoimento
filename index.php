<?php

require 'vendor/autoload.php';
$router = new AltoRouter();
$router->map('GET|POST', '/', 'LoginController#handleRequest');
$router->map('GET', '/dashboard', 'AdminController#dashboard');
$router->map('GET', '/logout', 'LogoutController#logout');
$router->map('GET|POST', '/upload', 'MediaController#upload');
$router->map('GET', '/media', 'MediaController#listFiles');
$match = $router->match();

if ($match) {
    list($controller, $method) = explode('#', $match['target']);
    require_once "controllers/$controller.php";
    $controller = new $controller();
    $controller->$method();
} else {
    header("HTTP/1.0 404 Not Found");
    echo 'Página não encontrada';
}