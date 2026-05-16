<?php
session_start();
require_once "../config/conexao.php";

if (!isset($_SESSION['nm_login']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

// PASSO 5 - salva o UPDATE quando formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id        = $_POST['id_produto'];
    $nome      = $_POST['nm_produto'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE produtos 
            SET nm_produto = :nome,
                categoria  = :categoria,
                descricao  = :descricao
            WHERE id_produto = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome',      $nome,      PDO::PARAM_STR);
    $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
    $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
    $stmt->bindParam(':id',        $id,        PDO::PARAM_INT);
    $stmt->execute();

    header("Location: produtos-admin.php");
    exit();
}

// PASSO 2 - busca o produto pelo ID que veio na URL
$id  = $_GET['id'];
$sql = "SELECT * FROM produtos WHERE id_produto = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
</head>
<body>

    <head>
        <link rel="stylesheet" href="../css/editar-usuarios-produtos.css">
    </head>

    <body>
    <header class="topbar">
        <a href="main-admin.php" class="topbar-logo">
            <img src="../img/icon-mimos-de-papel.jpg" alt="Logo">
            <span>Mimos de Papel</span>
        </a>
        <nav>
            <span class="badge-admin">Admin</span>
            <a href="produtos-admin.php">Voltar</a>
            <a href="../logout.php" class="sair">Sair</a>
        </nav>
    </header>

    <div class="container">
        <div class="card-form">
            <h2>Editar <span>Produto</span></h2>
            <form method="POST">
                <input type="hidden" name="id_produto" value="<?= $produto['id_produto'] ?>">
                <div class="campo">
                    <label>Nome</label>
                    <input type="text" name="nm_produto" value="<?= htmlspecialchars($produto['nm_produto']) ?>" required>
                </div>
                <div class="campo">
                    <label>Categoria</label>
                    <input type="text" name="categoria" value="<?= htmlspecialchars($produto['categoria']) ?>" required>
                </div>
                <div class="campo">
                    <label>Descrição</label>
                    <textarea name="descricao" required><?= htmlspecialchars($produto['descricao']) ?></textarea>
                </div>
                <div class="botoes">
                    <button type="submit">Salvar</button>
                    <a href="produtos-admin.php" class="btn-cancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>