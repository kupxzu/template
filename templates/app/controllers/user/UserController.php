<?php
require_once __DIR__ . '/../../models/User.php';


class UserController {
    private $pdo;
    private $userModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->userModel = new User($pdo);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = $this->userModel->login($username, $password);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
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

    public function register() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (
                !isset($_POST['csrf_token']) ||
                !isset($_SESSION['csrf_token']) ||
                $_POST['csrf_token'] !== $_SESSION['csrf_token']
            ) {
                $error = "Invalid CSRF token. Please try again.";
                include __DIR__ . '/../../views/user/login.php';
                exit;
            }

            $data = [
                'firstname' => $_POST['firstname'] ?? '',
                'lastname'  => $_POST['lastname'] ?? '',
                'email'     => $_POST['email'] ?? '',
                'username'  => $_POST['username'] ?? '',
                'password'  => $_POST['password'] ?? '',
            ];

            if ($this->userModel->register($data)) {
                unset($_SESSION['csrf_token']);
                header("Location: login.php");
                exit;
            } else {
                $error = "Registration failed. Please try again.";
                include __DIR__ . '/../../views/user/login.php';
            }
        } else {
            include __DIR__ . '/../../views/user/register.php';
        }
    }
}

