<?php
use Core\Router;
Router::add('index', '/', '\App\Controllers\HomeController');
Router::add('index2', '/index.php', '\App\Controllers\HomeController');


Router::add('login', '/login', '\App\Controllers\LoginController', 'login');
Router::add('register', '/register', '\App\Controllers\RegisterController', 'register');
Router::add('add', '/add', '\App\Controllers\Admin\CreateController', 'add');
Router::add('logout', '/logout', '\App\Controllers\Admin\LogoutController', 'logout');
Router::add('install', '/install', '\App\Controllers\InstallController', 'install');
Router::add('edit', "/edit", '\App\Controllers\Admin\UpdateController', 'edit');
Router::add('orders', "/orders", '\App\Controllers\Admin\AdminOrders', 'orderList');
Router::add('users', "/users", '\App\Controllers\Admin\AdminUsers', 'userList');
Router::add('user_orders', '/order', '\App\Controllers\User\OrdersController');

// API Routes
Router::add('api_pizza_get', '/api/pizza/get', \App\Controllers\Common\API\PizzaApiController::class);
Router::add('api_pizza_create', '/api/pizza/create', \App\Controllers\Admin\API\PizzaApiController::class, 'create');
Router::add('api_pizza_edit', '/api/pizza/edit', \App\Controllers\Admin\API\PizzaApiController::class, 'edit');
Router::add('api_pizza_update', '/api/pizza/update', \App\Controllers\Admin\API\PizzaApiController::class, 'update');
Router::add('api_pizza_delete', '/api/pizza/delete', \App\Controllers\Admin\API\PizzaApiController::class, 'delete');