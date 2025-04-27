<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("HTTP/1.0 403 Forbidden");
    exit;
}

require_once 'models/MediaModel.php';
$model = new MediaModel();

if (isset($_GET['id'])) {
    $file = $model->getFileById($_GET['id']);
    if ($file) {
        $filepath = 'uploads/' . $file['filename'];
        if (file_exists($filepath)) {
            if (isset($_GET['download'])) {
                header('Content-Type: ' . $file['filetype']);
                header('Content-Disposition: attachment; filename="' . $file['filename'] . '"');
                header('Content-Length: ' . $file['filesize']);
                readfile($filepath);
                exit;
            } else {
                header('Content-Type: ' . $file['filetype']);
                header('Content-Length: ' . $file['filesize']);
                readfile($filepath);
                exit;
            }
        }
    }
}
header("HTTP/1.0 404 Not Found");
echo 'Arquivo não encontrado';
?>