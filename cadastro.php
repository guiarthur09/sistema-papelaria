<?php
require "config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome     = $_POST['nome'];
    $login    = $_POST['nm_login'];
    $email    = $_POST['email'];
    $senha    = $_POST['senha'];
    $telefone = $_POST['telefone'];

    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios 
            (nome, nm_login, email, senha, telefone)
            VALUES (:nome, :login, :email, :senha, :telefone)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":nome", $nome);
    $stmt->bindValue(":login", $login);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":senha", $senhaCriptografada);
    $stmt->bindValue(":telefone", $telefone);

    $stmt->execute();

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>

<div class="container">

    <div class="logo">
        <img src="img/icon-mimos-de-papel.jpg" alt="Mimos de Papel" class="logo-icone">
        <h2>Criar Conta</h2>
        <p class="subtitulo">Mimos de Papel Papelaria</p>
    </div>

    <form method="POST">
        <div class="campo">
            <label>Nome</label>
            <input type="text" name="nome" placeholder="Seu nome completo" required>
        </div>

        <div class="campo">
            <label>Login</label>
            <input type="text" name="nm_login" placeholder="Seu usuário" required>
        </div>

        <div class="campo">
            <label>Email</label>
            <input type="email" name="email" placeholder="seu@email.com" required>
        </div>

        <div class="campo">
            <label>Senha</label>
            <input type="password" name="senha" placeholder="••••••••" required>
        </div>

        <div class="campo">
            <label>Telefone</label>
            <input type="text" name="telefone" placeholder="(47) 99999-9999" required>
        </div>

        <button type="submit">Cadastrar</button>
        <p>Já tem uma conta? <a href="login.php">Faça login</a></p>
    </form>
</div>

</body>
</html>