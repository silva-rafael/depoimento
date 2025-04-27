<?php
// Arquivo: controllers/AdminController.php
class AdminController {
    public function dashboard() {
        session_start();
        if (!isset($_SESSION['loggedin']) || $_SESSION['role'] !== 'admin') {
            header("Location: /");
            exit;
        }
        require_once 'views/adminDashboard.php';
    }
}