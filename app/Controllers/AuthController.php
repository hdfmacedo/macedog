<?php
namespace App\Controllers;

use App\Repositories\UserRepository;

/**
 * Handles user authentication.
 */
class AuthController
{
    private UserRepository $users;

    public function __construct()
    {
        $this->users = new UserRepository();
    }

    /**
     * Show login form.
     */
    public function showLogin()
    {
        require __DIR__ . '/../Views/login.php';
    }

    /**
     * Process login request.
     */
    public function login()
    {
        $password = $_POST['password'] ?? '';
        if ($this->users->verifyPassword($password)) {
            $_SESSION['logged_in'] = true;
            header('Location: /dashboard');
            exit;
        }

        $error = 'Senha inválida';
        require __DIR__ . '/../Views/login.php';
    }

    /**
     * Logout user.
     */
    public function logout()
    {
        session_destroy();
        header('Location: /login');
    }
}
