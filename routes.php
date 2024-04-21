<?php

use Bramus\Router\Router;

use Bomdev\Asmoop\Controllers\Admin\AuthenticateController;
use Bomdev\Asmoop\Controllers\Admin\CategoriesController;
use Bomdev\Asmoop\Controllers\Admin\DashboardController;
use Bomdev\Asmoop\Controllers\Admin\PostsController;
use Bomdev\Asmoop\Controllers\Client\HomeController;
use Bomdev\Asmoop\Controllers\Admin\UserController;
use Bomdev\Asmoop\Controllers\Admin\HomeController as AdminHomeController;
use Bomdev\Asmoop\Controllers\Client\PostController as ClientPostController;

// Create Router instance

$router = new Router();

// Define routes
$router->get('/',                                                 HomeController::class . '@index');
$router->get('/post/{id}',                                        ClientPostController::class . '@show');
$router->get('/category/{id}',                                    ClientPostController::class . '@showByIDCategory');
$router->match('GET|POST', '/auth/login',                         AuthenticateController::class . '@login');

$router->mount('/admin', function () use ($router) {
    $router->get('/',                                             AdminHomeController::class . '@index');
    $router->get('/logout',                                       AuthenticateController::class . '@logout');
    $router->get('/dashboard',                                    DashboardController::class . '@index');


    $router->mount('/users', function () use ($router) {
        $router->get('/',                                         UserController::class . '@index');
        $router->get('/{id}/show',                                UserController::class . '@show');
        $router->get('/{id}/delete',                              UserController::class . '@delete');
        $router->match('GET|POST', '/{id}/update',                UserController::class . '@update');
        $router->match('GET|POST', '/create',                     UserController::class . '@create');
    });
    $router->mount('/categories', function () use ($router) {
        $router->get('/',                                         CategoriesController::class . '@index');
        $router->get('/{id}/show',                                CategoriesController::class . '@show');
        $router->get('/{id}/delete',                              CategoriesController::class . '@delete');
        $router->match('GET|POST', '/create',                     CategoriesController::class . '@create');
        $router->match('GET|POST', '/{id}/update',                CategoriesController::class . '@update');
    });
    $router->mount('/posts', function () use ($router) {
        $router->get('/',                                         PostsController::class . '@index');
        $router->get('/{id}/show',                                PostsController::class . '@show');
        $router->get('/{id}/delete',                              PostsController::class . '@delete');
        $router->match('GET|POST', '/create',                     PostsController::class . '@create');
        $router->match('GET|POST', '/{id}/update',                PostsController::class . '@update');
    });
});
$router->before('GET|POST', '/admin/*', function () {
    if (!isset($_SESSION['user'])) {
        header('Location: /auth/login');
        exit();
    }
});
$router->before('GET|POST', '/admin/.*', function () {
    if (!isset($_SESSION['user'])) {
        header('Location: /auth/login');
        exit();
    }
});

// Run it!
$router->run();
