<?php
session_start(); // Iniciar sessão para controle de login
require_once "config/conexao.php"; // arquivo da conexão PDO

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = $_POST['nm_login'] ?? '';
    $senha = $_POST['senha'] ?? '';

    
    $sql = "SELECT id_usuario, nm_login, senha, tipo 
            FROM usuarios 
            WHERE nm_login = ?";
            
   
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$login]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se encontrou usuário
    if ($usuario) {

        // Verifica senha criptografada
        if (password_verify($senha, $usuario['senha'])) {

            //  Criar variáveis de sessão
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nm_login']   = $usuario['nm_login'];
            $_SESSION['tipo']       = $usuario['tipo'];

            if ($usuario['tipo'] === 'admin') {
                header("Location: admin/main-admin.php");
            } else {
                header("Location: main.php");
            }   
            exit();

        } else {
            // senha incorreta
            header("Location: index.php?erro=senha");
            exit();
        }

    } else {
        // usuário não encontrado
        header("Location: index.php?erro=usuario");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
   
</head>
<body>
    <div class="container">
        <h2>Login</h2>
       <form id="formLogin" method="POST" action="login.php">
            <label for="nm_login">Login</label>
            <input type="text" id="nm_login" name="nm_login" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
           
            <button type="submit" class="btn btn-primary">Entrar</button>
            <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
            <?php
              
                if (isset($_GET['erro'])) {

                    $mensagem = '';

                    if ($_GET['erro'] == 'usuario') {
                        $mensagem = "Usuário não encontrado!";
                    } elseif ($_GET['erro'] == 'senha') {
                        $mensagem = "Senha incorreta!";
                    } elseif ($_GET['erro'] == 'expirado') {
                        $mensagem = "Sua sessão expirou por inatividade. Faça login novamente.";
                    }

                    if ($mensagem != '') {
                        echo '<div class="erro-login">' . $mensagem . '</div>';
                    }
                }
                ?>
            
            <div id="message" style="display:none; margin-top: 10px;"></div>
        </form>
    </div>
   
</body>
</html>

