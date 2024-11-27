<?php
require 'conexao.php';

$_sucesso = false;

if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $perfil = $_POST['select'];

    mysqli_query($link, "INSERT INTO tb_usuarios(nome, email, senha, perfil) VALUES ('$nome', '$email', '$senha', '$perfil')");

    unset($_POST);
    $_sucesso = true;

    header('Location: index.php?cadastro=sucesso');
    exit();
}

?>