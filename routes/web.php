<?php
use App\Controllers\AuthController;
use App\Controllers\DashboardController;

$auth = new AuthController();
$dashboard = new DashboardController();

$router->get('/login', function() use ($auth) {
    $auth->showLogin();
});

$router->post('/login', function() use ($auth) {
    $auth->login();
});

$router->get('/logout', function() use ($auth) {
    $auth->logout();
});

$router->get('/dashboard', function() use ($dashboard) {
    if (!($_SESSION['logged_in'] ?? false)) {
        header('Location: /login');
        exit;
    }
    $dashboard->index();
});

// Default route: redirect to dashboard or login
$router->get('/', function() {
    if ($_SESSION['logged_in'] ?? false) {
        header('Location: /dashboard');
    } else {
        header('Location: /login');
    }
    exit;
});
