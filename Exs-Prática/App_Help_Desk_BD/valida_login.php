<?php
session_start();
include 'conexao.php';


$resultado = mysqli_query($link, 'SELECT id_usuario, nome, email, senha, perfil FROM TB_USUARIOS WHERE email = "' . $_POST['email'] . '" AND senha = "' . $_POST['senha'] . '";');


if (!$resultado) {
    die('Erro ao executar a consulta: ' . mysqli_error($link));
} else {
    $usuarioAutenticado = true;
}


if (!$usuarioAutenticado) {
    $_SESSION['autenticado'] = 'nao';
    header('Location: index.php?login=erro');
    exit();
} else {
    $_SESSION['autenticado'] = 'sim';
    header('Location: home.php');
}
?>
