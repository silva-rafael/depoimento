<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Arquivos Enviados</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { color: #333; }
        .gallery { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 10px; }
        .gallery-item { border: 1px solid #ddd; padding: 10px; text-align: center; }
        img, video { max-width: 100%; height: auto; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Arquivos Enviados</h1>
    <p>Usuário: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
    <div class="gallery">
        <?php foreach ($files as $file): ?>
            <div class="gallery-item">
                <?php if (strpos($file['filetype'], 'image') === 0): ?>
                    <img src="/download.php?id=<?php echo $file['id']; ?>" alt="<?php echo htmlspecialchars($file['filename']); ?>">
                <?php elseif (strpos($file['filetype'], 'video') === 0): ?>
                    <video controls>
                        <source src="/download.php?id=<?php echo $file['id']; ?>" type="<?php echo $file['filetype']; ?>">
                    </video>
                <?php endif; ?>
                <p><?php echo htmlspecialchars($file['filename']); ?></p>
                <p>Tamanho: <?php echo round($file['filesize'] / 1024, 2); ?> KB</p>
                <p>Data: <?php echo $file['upload_date']; ?></p>
                <a href="/download.php?id=<?php echo $file['id']; ?>&download=1">Baixar</a>
            </div>
        <?php endforeach; ?>
    </div>
    <p><a href="/dashboard">Voltar ao Painel</a> | <a href="/logout">Sair</a></p>
</body>
</html>