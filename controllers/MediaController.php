<?php
class MediaController {
    private $model;

    public function __construct() {
        require_once 'models/MediaModel.php';
        $this->model = new MediaModel();
    }

    public function upload() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $allowedTypes = ['image/jpeg', 'image/png', 'video/mp4', 'video/avi'];
            $maxSize = 10 * 1024 * 1024; // 10MB
            $file = $_FILES['file'];

            if ($file['error'] === UPLOAD_ERR_OK && in_array($file['type'], $allowedTypes) && $file['size'] <= $maxSize) {
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $ext;
                $destination = 'uploads/' . $filename;

                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $this->model->saveFile($filename, $file['type'], $file['size']);
                    $message = "Arquivo enviado com sucesso!";
                } else {
                    $message = "Erro ao mover o arquivo.";
                }
            } else {
                $message = "Arquivo inválido ou muito grande.";
            }
        }
        require_once 'views/upload.php';
    }

    public function listFiles() {
        session_start();
        if (!isset($_SESSION['loggedin'])) {
            header("Location: /");
            exit;
        }
        $files = $this->model->getAllFiles();
        require_once 'views/media.php';
    }
}