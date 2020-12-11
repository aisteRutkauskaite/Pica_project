<?php
use Core\Router;
Router::add('index', '/', '\App\Controllers\HomeController');
Router::add('index2', '/index.php', '\App\Controllers\HomeController');


Router::add('login', '/login', '\App\Controllers\LoginController', 'login');
Router::add('register', '/register', '\App\Controllers\RegisterController', 'register');
Router::add('add', '/add', '\App\Controllers\Admin\AddController', 'add');
Router::add('logout', '/logout', '\App\Controllers\Admin\LogoutController', 'logout');
Router::add('install', '/install', '\App\Controllers\InstallController', 'install');
Router::add('edit', "/edit", '\App\Controllers\Admin\EditController', 'edit');
Router::add('orders', "/orders", '\App\Controllers\Admin\AdminOrders', 'orderList');
Router::add('users', "/users", '\App\Controllers\Admin\AdminUsers', 'userList');
Router::add('user_orders', '/order', '\App\Controllers\User\OrdersController');