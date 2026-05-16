<?php
session_start();

if (!isset($_SESSION["nm_login"])) {
    header("Location: login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

    <header class="topbar">
        <a href="main.php" class="topbar-logo">
            <img src="img/icon-mimos-de-papel.jpg" alt="Logo">
        </a>
        <nav>
            <a href="produtos.php">Produtos</a>
            <a href="logout.php" class="sair">Sair</a>
        </nav>
    </header>

    <div class="container">
        <div class="card-boas-vindas">
            <img src="img/icon-mimos-de-papel.jpg" alt="Logo">
            <h2>Bem-vindo, <span><?= htmlspecialchars($_SESSION["nm_login"]) ?></span>!</h2>
            <p class="subtitulo">Obrigado por se cadastrar na Mimos de Papel 🎀</p>
        </div>

        <div class="atalhos">
            <a href="produtos.php" class="atalho-card">
                <span class="icone">🎀</span>
                <span>Ver Produtos</span>
            </a>
        </div>
    </div>

</body>
</html>