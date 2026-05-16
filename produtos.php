<?php
session_start();
require "config/conexao.php";

if (!isset($_SESSION["nm_login"])) {
    header("Location: login.php");
    exit;
}


$sql = "SELECT * FROM produtos";
$stmt = $pdo->query($sql);
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="css/produtos.css">
</head>
<body>

    <header class="topbar">
        <a href="main.php" class="topbar-logo">
        <img src="img/icon-mimos-de-papel.jpg" alt="Logo">
    </a>
    <nav>
        <a href="main.php">Início</a>
        <a href="logout.php" class="sair">Sair</a>
    </nav>
    </header>

    <div class="container">
        <div class="page-header">
            <h2>Nossos <span>Produtos</span></h2>
            <p>Papelaria personalizada feita com amor</p>
        </div>

        <div class="produtos-grid">
            <?php if (empty($produtos)): ?>
                <div class="sem-produtos">
                    <span>🎀</span>
                    <p>Nenhum produto cadastrado ainda.</p>
                </div>
            <?php else: ?>
                <?php foreach ($produtos as $produto): ?>
                <div class="produto-card">
                    <div class="produto-card-img">🎀</div>
                    <div class="produto-card-body">
                        <span class="produto-categoria"><?= htmlspecialchars($produto['categoria']) ?></span>
                        <h3><?= htmlspecialchars($produto['nm_produto']) ?></h3>
                        <p><?= htmlspecialchars($produto['descricao']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>