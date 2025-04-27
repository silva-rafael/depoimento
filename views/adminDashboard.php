<?php

// Arquivo: views/adminDashboard.php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { color: #333; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <h1>Bem-vindo ao Painel Administrativo</h1>
    <p>Usuário: <?php echo htmlspecialchars($_SESSION['username']); ?></p>
    <a href="/logout">Sair</a>
</body>
</html>