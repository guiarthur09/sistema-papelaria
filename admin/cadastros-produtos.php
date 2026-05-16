<?php
session_start();
require "../config/conexao.php";

if (!isset($_SESSION['nm_login']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome     = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $categoria    = $_POST['categoria'];

    $sql = "INSERT INTO produtos 
            (nm_produto, descricao, categoria)
            VALUES (:nome, :descricao, :categoria)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":categoria", $categoria);
    $stmt->bindValue(":descricao", $descricao);

    $stmt->execute();

    header("Location: produtos-admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
    <link rel="stylesheet" href="../css/editar-usuarios-produtos.css">
    </head>
    <body>

        <header class="topbar">
            <a href="main-admin.php" class="topbar-logo">
                <img src="../img/logo.png" alt="Logo">
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
                <h2>Cadastrar <span>Produto</span></h2>
                <form method="POST">
                    <div class="campo">
                        <label>Nome</label>
                        <input type="text" name="nome" required>
                    </div>
                    <div class="campo">
                        <label>Categoria</label>
                        <select name="categoria">
                            <option value="">Selecione</option>
                            <option value="Topo de Bolo Simples">Topo de Bolo Simples</option>
                            <option value="Topo de Bolo Decorado">Topo de Bolo Decorado</option>
                            <option value="Adesivos">Adesivos</option>
                        </select>
                    </div>
                    <div class="campo">
                        <label>Descrição</label>
                        <textarea name="descricao" required></textarea>
                    </div>
                    <div class="botoes">
                        <button type="submit">Cadastrar</button>
                        <a href="produtos-admin.php" class="btn-cancelar">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
</body>
</html>