<?php

// Arquivo: controllers/LogoutController.php
class LogoutController {
    public function logout() {
        session_start();
        session_destroy();
        header("Location: /");
        exit;
    }
}
