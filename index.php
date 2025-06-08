<?php
/**
 * Main Entry Point - Redirects to the public folder
 */

// Define the base path
define('BASE_PATH', __DIR__);

// Redirect to the public folder
require_once BASE_PATH . '/public/index.php';