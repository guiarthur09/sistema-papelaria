<?php
session_start();
require_once "../config/conexao.php";

if (!isset($_SESSION['nm_login']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Admin</title>
    <link rel="stylesheet" href="../css/main-admin.css">
</head>
<body>

    <header class="topbar">
        <a href="main-admin.php" class="topbar-logo">
            <img src="../img/icon-mimos-de-papel.jpg" alt="Logo">
        </a>
        <nav>
            <span class="badge-admin">Admin</span>
            <a href="produtos-admin.php">Produtos</a>
            <a href="cadastros-usuarios.php">Usuários</a>
            <a href="../logout.php" class="sair">Sair</a>
        </nav>
    </header>

    <div class="container">
        <div class="card-boas-vindas">
            <img src="../img/icon-mimos-de-papel.jpg" alt="Logo">
            <h2>Olá, <span><?= htmlspecialchars($_SESSION["nm_login"]) ?></span>!</h2>
            <p class="subtitulo">Painel Administrativo — Mimos de Papel 🎀</p>
        </div>

        <div class="atalhos">
            <a href="produtos-admin.php" class="atalho-card">
                <span class="icone">🎀</span>
                <span>Produtos</span>
            </a>
            <a href="cadastros-usuarios.php" class="atalho-card">
                <span class="icone">👥</span>
                <span>Usuários</span>
            </a>
        </div>
    </div>

</body>
</html>