<?php

/**
 * Application Entry Point
 */

// Load configuration
require_once __DIR__ . '/../config/app.php';

// Load helpers
require_once APP_DIR . '/helpers/view-helper.php';

// Simple autoloader for controllers
spl_autoload_register(function ($className) {
    $file = APP_DIR . '/controllers/' . $className . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Load routes
$routes = require_once ROOT_DIR . '/routes/web.php';

// Get current URI
$base = dirname($_SERVER['SCRIPT_NAME']); // hasilnya: /antosa-architect/public
$uri = str_replace($base, '', $_SERVER['REQUEST_URI']);
$uri = parse_url($uri, PHP_URL_PATH);
$uri = $uri ?: '/';


// Find matching route
$route = $routes[$uri] ?? null;

if (!$route) {
    // Route not found, return 404
    header('HTTP/1.0 404 Not Found');
    echo '404 - Page Not Found';
    exit;
}

// Check request method if specified
if (isset($route['method']) && $_SERVER['REQUEST_METHOD'] !== $route['method']) {
    header('HTTP/1.0 405 Method Not Allowed');
    echo '405 - Method Not Allowed';
    exit;
}

// Get controller and action
$controllerName = $route['controller'];
$actionName = $route['action'];

// Instantiate controller and call action
$controller = new $controllerName();
$controller->$actionName();
