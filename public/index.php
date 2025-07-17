<?php
/**
 * Basic front controller to bootstrap the application.
 */

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Helpers\Router;

session_start();

$router = new Router();

// Define routes
require __DIR__ . '/../routes/web.php';

// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
