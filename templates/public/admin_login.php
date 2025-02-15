<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/controllers/admin/AdminController.php';

$controller = new AdminController($pdo);
$controller->login();