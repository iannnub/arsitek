<?php

/**
 * Web Routes
 * 
 * Define the routes for the web application using associative array
 */

$routes = [
    '/' => [
        'controller' => 'HomeController',
        'action' => 'index'
    ],

'/auth/login' => [
    'controller' => 'AuthController',
    'action' => 'loginForm'
],
'/auth/register' => [
    'controller' => 'AuthController',
    'action' => 'registerForm'
],
'/auth/forgot-password' => [
    'controller' => 'AuthController',
    'action' => 'forgotForm'
],

'/auth/submit' => [
    'controller' => 'AuthController',
    'action' => 'handleAuth',
    'method' => 'POST'
],
'/menu-admin' => [
    'controller' => 'DashboardController',
    'action' => 'admin'
],
'/menu-client' => [
    'controller' => 'DashboardController',
    'action' => 'client'
],
'/logout' => [
    'controller' => 'AuthController',
    'action' => 'logout'
],




];

return $routes;
