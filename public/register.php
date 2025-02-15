<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/controllers/user/UserController.php';

$controller = new UserController($pdo);
$controller->register();
