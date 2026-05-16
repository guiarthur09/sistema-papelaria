<?php
session_start();
require_once "../config/conexao.php";

if (!isset($_SESSION['nm_login']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$sql = "SELECT id_usuario, nome, nm_login, email FROM usuarios ORDER BY id_usuario";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Usuários Admin</title>
    <link rel="stylesheet" href="../css/produtos-admin.css">
</head>
<body>

    <header class="topbar">
        <a href="main-admin.php" class="topbar-logo">
            <img src="../img/icon-mimos-de-papel.jpg" alt="Logo">
        </a>
        <nav>
            <span class="badge-admin">Admin</span>
            <a href="produtos-admin.php">Produtos</a>
            <a href="../logout.php" class="sair">Sair</a>
        </nav>
    </header>

    <div class="container">
        <div class="page-header">
            <h2>Gestão de <span>Usuários</span></h2>
            <a href="../cadastro.php" class="btn-adicionar">+ Novo Usuário</a>
        </div>

        <div class="tabela-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Login</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id_usuario']) ?></td>
                        <td><?= htmlspecialchars($user['nome']) ?></td>
                        <td><?= htmlspecialchars($user['nm_login']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td>
                            <div class="acoes">
                                <a href="editar-usuarios.php?id=<?= $user['id_usuario'] ?>" class="btn-editar">✏️ Editar</a>
                                <a href="excluir-usuarios.php?id=<?= $user['id_usuario'] ?>" class="btn-excluir" onclick="return confirm('Deseja excluir este usuário?')">🗑️ Excluir</a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>