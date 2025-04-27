<?php

// Arquivo: models/UserModel.php
class UserModel {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=loginpage", "root", "", [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            die("Conexão falhou: " . $e->getMessage());
        }
    }

    public function checkLogin($username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM adminlogin WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user && password_verify($password, $user['password']) ? $user : false;
    }
}