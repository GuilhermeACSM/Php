<?php
session_start();

$usuarios = array (
    ['email' => 'zguilherme@gmail.com', 'senha' => '12345'],
    ['email' => 'guilherme@gmail.com', 'senha' => '123'],
    ['email' => 'carlos@gmail.com', 'senha' => '1234']
);

$usuarioAutenticado = false;

//RECEBENDO OS DADOS VIA MÉTODO POST
$emailUsuario = $_POST['email'];
$senhaUsuario = $_POST['senha'];

// AUTENTICANDO O USUÁRIO
for ($idx = 0; $idx < count($usuarios); $idx++) {
    if ($emailUsuario == $usuarios[$idx]['email'] && $senhaUsuario == $usuarios[$idx]['senha']) {
        $usuarioAutenticado = true;
        break;
    } else {
        $usuarioAutenticado = false;
    }
}

if($usuarioAutenticado){
    // VALIDANDO A SESSÃO
    $_SESSION['autenticado'] = 'sim';
    header('location: home.php');
} else {
    // VALIDANDO A SESSÃO
    $_SESSION['autenticado'] = 'nao';
    header('location: index.php?login=erro');
}
?>