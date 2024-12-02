<?php
require 'conexao.php';
require_once "validador_acesso.php";

$_sucesso = false;

if ($_POST) {
    // Certificando-se de que o id_usuario está correto
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];


    // Inserir o chamado no banco de dados
    $sql = mysqli_query($link, "INSERT INTO `tb_chamados`(`titulo`, `categoria`, `descricao`) VALUES ('$titulo','$categoria','$descricao');");

    // Verificando o resultado da consulta
    if ($sql) {
        $_sucesso = true;
    }


    unset($_POST);
    // Verificar se a inserção foi bem-sucedida
    if ($_sucesso) {
        header('Location: abrir_chamado.php?cadastro=efetuado');
    } else {
        header('Location: abrir_chamado.php?cadastro=falha');
    }
    exit;
}
