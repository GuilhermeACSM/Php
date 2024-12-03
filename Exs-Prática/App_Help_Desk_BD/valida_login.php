<?php
session_start();
include 'conexao.php';


$resultado = mysqli_query($link, 'SELECT email, senha FROM TB_USUARIOS');


if (!$resultado) {
    die('Erro ao executar a consulta: ' . mysqli_error($link));
} 


$usuarioAutenticado = false;
// Recebendo os dados via POST
$emailUsuario = $_POST['email'];
$senhaUsuario = $_POST['senha'];

// Autenticando o usuário
foreach ($resultado as $usuario) {
    if ($emailUsuario == $usuario['email'] && $senhaUsuario == $usuario['senha']) {
        $usuarioAutenticado = true;
        $_SESSION['autenticado'] = 'sim';  // Definindo a sessão como autenticada
        $_SESSION['id'] = $usuario['id']; // Armazenando o ID do usuário na sessão
        $_SESSION['perfil'] = $usuario['perfil']; // Armazenando o perfil (Administrador/Usuário) na sessão
        header('Location: home.php');
        exit();
    }
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
