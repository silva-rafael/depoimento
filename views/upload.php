<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Upload de Arquivos</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background-color: #f0f0f0; }
        .upload-container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input[type="file"] { margin: 10px 0; }
        button { padding: 8px; width: 100%; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .message { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="upload-container">
        <h2>Upload de Imagens e Vídeos</h2>
        <?php if (isset($message)) echo "<p class='" . (strpos($message, 'Erro') === false ? 'message' : 'error') . "'>$message</p>"; ?>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file" accept="image/jpeg,image/png,video/mp4,video/avi" required>
            <button type="submit">Enviar</button>
        </form>
        <p><a href="/">Voltar para Login</a></p>
    </div>
</body>
</html>