<?php
session_start();
require_once "../config/conexao.php";

if (!isset($_SESSION['nm_login']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM produtos WHERE id_produto = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("Location: produtos-admin.php");
exit();
?>