<?php
include "conexao.php";

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql = "INSERT INTO usuarios (usuario, senha) VALUES (?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ss", $usuario, $senha);

if ($stmt->execute()) {
    header("Location: login.html");
    exit();
} else {

    if ($stmt->errno == 1062) {
        echo "Usuário já existe! Escolha outro nome.";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }
}
?>
