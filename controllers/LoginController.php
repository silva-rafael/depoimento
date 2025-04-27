<?php
// Arquivo: controllers/LoginController.php
class LoginController {
    private $model;

    public function __construct() {
        require_once 'models/UserModel.php';
        $this->model = new UserModel();
    }

    public function handleRequest() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
            $user = $this->model->checkLogin($_POST['username'], $_POST['password']);
            if ($user) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'] ?? 'user';
                header("Location: views/adminDashboard.php");
                exit;
            } else {
                $error = "Usuário ou senha inválidos";
                require_once 'views/login.php';
            }
        } else {
            require_once 'views/login.php';
        }
    }
}
