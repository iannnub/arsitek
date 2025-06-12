<?php

/**
 * Web Routes
 * 
 * Define the routes for the web application using an associative array.
 * Routes are mapped to controllers and actions, with optional HTTP methods.
 */

$routes = [
    '/' => [
        'controller' => 'HomeController',
        'action' => 'index',
        'method' => 'GET'
    ],
    
    '/auth/login' => [
        'controller' => 'AuthController',
        'action' => 'loginForm',
        'method' => 'GET'
    ],

    '/auth/register' => [
        'controller' => 'AuthController',
        'action' => 'registerForm',
        'method' => 'GET'
    ],

    '/auth/forgot-password' => [
        'controller' => 'AuthController',
        'action' => 'forgotForm',
        'method' => 'GET'
    ],

    '/auth/submit' => [
        'controller' => 'AuthController',
        'action' => 'handleAuth',
        'method' => 'POST'
    ],

    // Route untuk Admin Dashboard
    '/admin/dashboard' => [
        'controller' => 'DashboardController',
        'action' => 'admin',
        'method' => 'GET',
        'middleware' => 'auth',  // Only authenticated users with admin role can access this
    ],

    // Route untuk Client Dashboard
    '/client/dashboard' => [
        'controller' => 'DashboardController',
        'action' => 'client',
        'method' => 'GET',
        'middleware' => 'auth',  // Only authenticated users with client role can access this
    ],

    // Route logout, pastikan pengguna yang logout terarah dengan benar
    '/auth/logout' => [
        'controller' => 'AuthController',
        'action' => 'logout',
        'method' => 'GET' // Pastikan menggunakan GET untuk logout
    ],
];

return $routes;
