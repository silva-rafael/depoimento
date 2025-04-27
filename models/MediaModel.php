<?php
class MediaModel {
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

    public function saveFile($filename, $filetype, $filesize) {
        $stmt = $this->pdo->prepare("INSERT INTO media (filename, filetype, filesize) VALUES (:filename, :filetype, :filesize)");
        $stmt->execute([
            'filename' => $filename,
            'filetype' => $filetype,
            'filesize' => $filesize
        ]);
        return $this->pdo->lastInsertId();
    }

    public function getAllFiles() {
        $stmt = $this->pdo->prepare("SELECT * FROM media ORDER BY upload_date DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFileById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM media WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}