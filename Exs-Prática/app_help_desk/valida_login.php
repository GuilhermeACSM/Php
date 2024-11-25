<?php
session_start();

// Lista de usuários fictícios com ID, e-mail e senha
$usuarios = array (
    ['id' => 1, 'email' => 'zguilherme@gmail.com', 'senha' => '12345', 'perfil' => 'administrador'],
    ['id' => 2, 'email' => 'guilherme@gmail.com', 'senha' => '123', 'perfil' => 'usuario'],
    ['id' => 3, 'email' => 'carlos@gmail.com', 'senha' => '1234', 'perfil' => 'usuario']
);

$usuarioAutenticado = false;

// Recebendo os dados via POST
$emailUsuario = $_POST['email'];
$senhaUsuario = $_POST['senha'];

// Autenticando o usuário
foreach ($usuarios as $usuario) {
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
}
?>
