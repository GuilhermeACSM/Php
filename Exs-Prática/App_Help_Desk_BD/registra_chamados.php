<?php
require 'conexao.php';
require_once "validador_acesso.php";

$_sucesso = false;

if ($_POST) {
    // Organizando os dados, retirando "|" dos possíveis valores
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $idUsuario = $_SESSION['id'];
    $perfilUsuario = $_SESSION['select'];

    mysqli_query($link, "INSERT INTO `tb_chamados`(`id_usuario`, `titulo`, `categoria`, `descricao`) VALUES ('$idUsuario','$titulo','$categoria','$descricao'");


    unset($_POST);
    $_sucesso = true;
}




// Redirecionando o usuário de volta para a página de abertura de chamado
header('Location: abrir_chamado.php?cadastro=efetuado');
exit();
