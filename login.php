<?php
include "conexao.php";

$usuario = $_POST['usuario'];
$senha = md5($_POST['senha']);

$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    
    $dados = $result->fetch_assoc();

    if ($dados['senha'] === $senha) {
        header("Location: inicio.html");
        exit();
    } else {
        echo "Senha incorreta!";
    }

} else {
    echo "Usuário não encontrado!";
}
?>
