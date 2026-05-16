<?php
session_start();
require "../config/conexao.php";

if (!isset($_SESSION['nm_login']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../login.php");
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
    <title>Produtos Admin</title>
    <link rel="stylesheet" href="../css/produtos-admin.css">
</head>
<body>

<header class="topbar">
    <a href="main-admin.php" class="topbar-logo">
        <img src="../img/icon-mimos-de-papel.jpg" alt="Logo">
    </a>
    <nav>
        <span class="badge-admin">Admin</span>
        <a href="cadastros-usuarios.php">Usuários</a>
        <a href="../logout.php" class="sair">Sair</a>
    </nav>
</header>

<div class="container">
    <div class="page-header">
        <h2>Gestão de <span>Produtos</span></h2>
        <a href="cadastros-produtos.php" class="btn-adicionar">+ Adicionar Produto</a>
    </div>

    <div class="tabela-wrapper">
        <?php if (empty($produtos)): ?>
            <div class="sem-produtos">
                <span>🎀</span>
                <p>Nenhum produto cadastrado ainda.</p>
            </div>
        <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= htmlspecialchars($produto['nm_produto']) ?></td>
                    <td><span class="produto-categoria"><?= htmlspecialchars($produto['categoria']) ?></span></td>
                    <td><?= htmlspecialchars($produto['descricao']) ?></td>
                    <td>
                        <div class="acoes">
                            <a href="editar-produtos.php?id=<?= $produto['id_produto'] ?>" class="btn-editar">✏️ Editar</a>
                            <a href="excluir-produtos.php?id=<?= $produto['id_produto'] ?>" class="btn-excluir" onclick="return confirm('Deseja excluir este produto?')">🗑️ Excluir</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

</body>
</html>