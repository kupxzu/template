<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Register a new user
    public function register($data) {
        $sql = "INSERT INTO users (firstname, lastname, email, username, password) 
                VALUES (:firstname, :lastname, :email, :username, :password)";
        $stmt = $this->pdo->prepare($sql);
        
        // Hash the password using PHP's default algorithm (bcrypt)
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt->bindParam(':firstname', $data['firstname']);
        $stmt->bindParam(':lastname', $data['lastname']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':username', $data['username']);
        $stmt->bindParam(':password', $hashedPassword);
        return $stmt->execute();
    }

    // Login user
    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = :username AND status = 'on' LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify password
        if($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
