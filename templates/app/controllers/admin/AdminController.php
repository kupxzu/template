<?php
// app/controllers/admin/AdminController.php

require_once __DIR__ . '/../../models/Admin.php';

class AdminController {
    private $pdo;
    private $adminModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->adminModel = new Admin($pdo);
    }

    // Handle the admin login process.
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $admin = $this->adminModel->login($username, $password);
            
            if ($admin) {
                session_start();
                $_SESSION['admin'] = $admin;
                header('Location: admin_dashboard.php');
                exit;
            } else {
                $error = "Invalid credentials";
                // Load the admin login view with an error message.
                include __DIR__ . '/../../views/admin/login.php';
            }
        } else {
            // Load the admin login view.
            include __DIR__ . '/../../views/admin/login.php';
        }
    }

    // Display the admin dashboard.
    public function dashboard() {
        session_start();
        if (!isset($_SESSION['admin'])) {
            header('Location: admin_login.php');
            exit;
        }
        include __DIR__ . '/../../views/admin/dashboard.php';
    }

    // Log out the admin.
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: admin_login.php");
        exit;
    }
}
