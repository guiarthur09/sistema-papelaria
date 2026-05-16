<?php
session_start();
require_once "../config/conexao.php";

if (!isset($_SESSION['nm_login']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id    = $_POST['id_usuario'];
    $nome  = $_POST['nome'];
    $login = $_POST['nm_login'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($senha)) {
        $sql = "UPDATE usuarios 
                SET nome = :nome, nm_login = :login, email = :email
                WHERE id_usuario = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome',  $nome,  PDO::PARAM_STR);
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id',    $id,    PDO::PARAM_INT);
    } else {
        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios 
                SET nome = :nome, nm_login = :login, email = :email, senha = :senha
                WHERE id_usuario = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nome',  $nome,  PDO::PARAM_STR);
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $hash,  PDO::PARAM_STR);
        $stmt->bindParam(':id',    $id,    PDO::PARAM_INT);
    }

    $stmt->execute();
    header("Location: cadastros-usuarios.php");
    exit();
}

$id  = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id_usuario = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
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
        <a href="cadastros-usuarios.php">Voltar</a>
        <a href="../logout.php" class="sair">Sair</a>
    </nav>
</header>

<div class="container">
    <div class="card-form">
        <h2>Editar <span>Usuário</span></h2>
        <form method="POST">
            <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario'] ?>">
            <div class="campo">
                <label>Nome</label>
                <input type="text" name="nome" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
            </div>
            <div class="campo">
                <label>Login</label>
                <input type="text" name="nm_login" value="<?= htmlspecialchars($usuario['nm_login']) ?>" required>
            </div>
            <div class="campo">
                <label>Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" required>
            </div>
            <div class="campo">
                <label>Nova Senha <small>(deixe em branco para não alterar)</small></label>
                <input type="password" name="senha">
            </div>
            <div class="botoes">
                <button type="submit">Salvar</button>
                <a href="cadastros-usuarios.php" class="btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>