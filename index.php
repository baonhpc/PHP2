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
use Src\Controllers\Admin\AttributeController;
use Src\Controllers\Admin\BrandController;
use Src\Controllers\Admin\CategoryController;
use Src\Controllers\Admin\CommentController;
use Src\Controllers\Admin\DashboardController;
use Src\Controllers\Admin\OrdersController;
use Src\Controllers\Admin\UserController;
use Src\Controllers\Admin\ProductsController;
use Src\Models\Database;
use Src\Controllers\Client\HomeController;
use Src\Controllers\Client\ProductController;
use Src\Controllers\Client\AuthController;
use Src\Controllers\Client\ContactController;
use Src\Controllers\Client\IntroduceController;
use Src\Controllers\Client\BlogController;
use Src\Controllers\Client\UserInfoController;
use Src\Controllers\Client\CartController;
use Src\Controllers\Client\CheckoutController;
use Src\Controllers\Client\SearchController;

$connection = new Database();



$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', [HomeController::class, 'show']);
    $r->addRoute('GET', '/home', [HomeController::class, 'show']);
    $r->addRoute('GET', '/list', [ProductController::class, 'show']);
    $r->addRoute('GET', '/detail', [ProductController::class, 'detail']);
    $r->addRoute('GET', '/blog', [BlogController::class, 'show']);
    $r->addRoute('GET', '/myaccount', [UserInfoController::class, 'myaccount']);
    $r->addRoute('GET', '/orders', [UserInfoController::class, 'orders']);
    $r->addRoute('GET', '/orderDetail', [UserInfoController::class, 'orderDetail']);
    $r->addRoute('GET', '/changePassword', [UserInfoController::class, 'changePassword']);
    $r->addRoute('GET', '/address', [UserInfoController::class, 'address']);
    $r->addRoute('GET', '/blog-detail', [BlogController::class, 'detail']);
    $r->addRoute('GET', '/contact', [ContactController::class, 'show']);
    $r->addRoute('GET', '/introduce', [IntroduceController::class, 'show']);
    $r->addRoute('GET', '/signup', [AuthController::class, 'register']);
    $r->addRoute('GET', '/signin', [AuthController::class, 'login']);
    $r->post('/register-action', [AuthController::class, 'store']);
    $r->post('/user-login', [AuthController::class, 'authLogin']);
    $r->addRoute('GET', '/cart', [CartController::class, 'show']);
    $r->addRoute('GET', '/checkout', [CheckoutController::class, 'show']);
    $r->addRoute('GET', '/Search', [SearchController::class, 'show']);
    $r->addGroup('/admin', function (FastRoute\RouteCollector $r) {
        $r->get('/admin', [DashboardController::class, 'show']);
        $r->get('/admin/dashboard', [DashboardController::class, 'show']);
        $r->get('', [DashboardController::class, 'show']);
        $r->get('/dashboard', [DashboardController::class, 'show']);
        $r->get('/users', [UserController::class, 'show']);
        $r->get('/create-user', [UserController::class, 'add']);
        $r->get('/user-order/{user_id}/{order_id}', [UserController::class, 'showUserOrderDetails']);
        $r->get('/edit-user/{id:\d+}', [UserController::class, 'edit']);
        $r->get('/locked-account', [UserController::class, 'locked']);
        $r->post('/add-user', [UserController::class, 'store']);
        $r->post('/user-search', [UserController::class, 'search']);
        $r->post('/edit-user/{id:\d+}', [UserController::class, 'update']);
        $r->post('/lock-user/{id:\d+}', [UserController::class, 'lockUser']);
        $r->post('/user/get-order/{id}', [UserController::class, 'showOrders']);
        $r->delete('/delete-user/{id:\d+}', [UserController::class, 'delete']);

        $r->get('/products', [productsController::class, 'index']);
        $r->get('/product/add', [productsController::class, 'add']);
        $r->get('/product/detail/{id}', [productsController::class, 'show']);
        $r->get('/edit-product/{id}', [productsController::class, 'edit']);
        $r->get('/product/detail/description/{id}', [ProductsController::class, 'loadDescription']);
        $r->get('/delete-sku/{sku_id}/{product_id}', [ProductsController::class, 'deleteSku']);
        $r->get('/edit-variant/{product_id}/{sku_id}', [ProductsController::class, 'variantEdit']);
        $r->get('/edit-specification/{id}', [ProductsController::class, 'specificationEdit']);
        $r->get('/delete-product/{id}', [productsController::class, 'delete']);
        $r->post('/edit-specs/{id}', [ProductsController::class, 'updateSpecs']);
        $r->post('/product/update/{id}', [ProductsController::class, 'update']);
        $r->post('/product/store', [ProductsController::class, 'store']);
        $r->post('/get-child-categories', [ProductsController::class, 'selectResult']);
        $r->post('/variant/edit/{product_id}/{sku_id}', [ProductsController::class, 'updateVariant']);
        $r->delete('/variant/delete/{sku_value}/{option_value}', [ProductsController::class, 'deleteProperty']);


        $r->get('/allAttribute', [AttributeController::class, 'show']);
        $r->get('/attribute', [AttributeController::class, 'add']);
        $r->get('/attribute-edit/{id}', [AttributeController::class, 'edit']);
        $r->get('/delete-attribute/{id}', [AttributeController::class, 'delete']);
        $r->post('/attribute-add', [AttributeController::class, 'store']);
        $r->post('/attribute-update/{id}', [AttributeController::class, 'update']);
        $r->get('/categories', [CategoryController::class, 'show']);
        $r->get('/category/CategoryValueList/{id}', [CategoryController::class, 'showSub']);
        $r->get('/category/CategoryValueAdd/{id}', [CategoryController::class, 'addSub']);
        $r->get('/category/add', [CategoryController::class, 'add']);
        $r->get('/category/edit/{id}', [CategoryController::class, 'edit']);
        $r->post('/category/update/{id}', [CategoryController::class, 'update']);
        $r->get('/category/delete/{id}', [CategoryController::class, 'delete']);
        $r->post('/category/store', [CategoryController::class, 'store']);
        $r->post('/category/storeSub', [CategoryController::class, 'storeSub']);
        $r->get('/category/value/edit/{id}', [CategoryController::class, 'editSub']);
        $r->post('/category/value/update/{id}', [CategoryController::class, 'updateSub']);
        $r->post('/category/value/delete/{id}', [CategoryController::class, 'deleteSub']);
        $r->get('/brands', [BrandController::class, 'show']);
        $r->get('/brand/add', [BrandController::class, 'add']);
        $r->get('/edit-brand/{id:\d+}', [BrandController::class, 'edit']);
        $r->post('/add-brand', [BrandController::class, 'store']);
        $r->post('/update-brand/{id:\d+}', [BrandController::class, 'update']);
        $r->delete('/delete-brand/{id:\d+}', [BrandController::class, 'delete']);

        $r->get('/comments', [CommentController::class, 'show']);
        $r->get('/orders', [OrdersController::class, 'show']);
        $r->get('/order-detail/{id}', [OrdersController::class, 'detail']);
        $r->post('/order-search', [OrdersController::class, 'search']);
        $r->post('/update-order-status', [OrdersController::class, 'changeStatus']);
    });
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
