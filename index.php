<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE);
ini_set('error_log', './logs/php-errors.log');

use FastRoute\RouteCollector;
use League\Plates\Extension\URI;
use Src\Models\Database;
use Src\Controllers\Client\HomeController;
use Src\Controllers\Client\ProductControler;
use Src\Controllers\Client\AuthController;
use Src\Controllers\Client\ContactController;
use Src\Controllers\Client\IntroduceController;
use Src\Controllers\Client\BlogController;
use Src\Controllers\Client\UserController;



$connection = new Database();



$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', [HomeController::class, 'show']);
    $r->addRoute('GET', '/home', [HomeController::class, 'show']);
    $r->addRoute('GET', '/list', [ProductControler::class, 'show']);
    $r->addRoute('GET', '/detail', [ProductControler::class, 'detail']);
    $r->addRoute('GET', '/blog', [BlogController::class, 'show']);
    $r->addRoute('GET', '/myaccount', [UserController::class, 'myaccount']);
    $r->addRoute('GET', '/blog-detail', [BlogController::class, 'detail']);
    $r->addRoute('GET', '/contact', [ContactController::class, 'show']);
    $r->addRoute('GET', '/introduce', [IntroduceController::class, 'show']);
    $r->addRoute('GET', '/signup', [AuthController::class, 'register']);
    $r->addRoute('GET', '/signin', [AuthController::class, 'login']);
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo 'Not Found';
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        echo 'Forbidden Method';
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $method = $handler[1];
        // ... call $handler with $vars

        $controller = new $handler[0];
        $controller->$method($vars);
        break;
}
