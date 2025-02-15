<?php
require_once __DIR__ . '/../../models/User.php';

class UserController {
    private $pdo;
    private $userModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->userModel = new User($pdo);
    }

    // Handle login requests
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = $this->userModel->login($username, $password);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                // Redirect to a profile or dashboard page
                header("Location: /templates/app/views/user/profile.php");
                exit;
            } else {
                $error = "Invalid credentials or inactive account.";
                include __DIR__ . '/../../views/user/login.php';
            }
        } else {
            include __DIR__ . '/../../views/user/login.php';
        }
    }

    // Handle registration requests
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'firstname' => $_POST['firstname'] ?? '',
                'lastname'  => $_POST['lastname'] ?? '',
                'email'     => $_POST['email'] ?? '',
                'username'  => $_POST['username'] ?? '',
                'password'  => $_POST['password'] ?? '',
            ];
            // (Optional) Add form validation here

            if ($this->userModel->register($data)) {
                // Registration successful, redirect to login
                header("Location: login.php");
                exit;
            } else {
                $error = "Registration failed. Please try again.";
                include __DIR__ . '/../../views/user/register.php';
            }
        } else {
            include __DIR__ . '/../../views/user/register.php';
        }
    }
}
