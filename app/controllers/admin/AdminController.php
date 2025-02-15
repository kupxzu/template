<?php
require_once __DIR__ . '/../../models/Admin.php';

class AdminController {
    private $pdo;
    private $adminModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->adminModel = new Admin($pdo);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $admin = $this->adminModel->login($username, $password);
            
            if ($admin) {
                session_start();
                $_SESSION['admin'] = $admin;
                header('Location: /templates/app/views/admin/admin_dashboard.php');
                exit;
            } else {
                $error = "Invalid credentials";
                include __DIR__ . '/../../views/admin/admin_login.php';
            }
        } else {
            include __DIR__ . '/../../views/admin/admin_login.php';
        }
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('Location: admin_login.php');
            exit;
        }
        include __DIR__ . '/../../../templates/app/views/admin/admin_dashboard.php';
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: admin_login.php");
        exit;
    }
}
