<?php
require_once "validador_acesso.php";
require_once "validador_acessoADM.php";
require "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<meta charset="utf-8" />
<title>App Help Desk</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<style>
    /* Estilos gerais */
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .navbar {
        margin-bottom: 20px;
    }

    .card-home {
        padding: 20px;
        margin: 0 auto;
    }

    .card-header {
        font-weight: bold;
        background-color: #343a40;
        color: white;
    }

    .card-body {
        text-align: center;
    }

    .row {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .col-6 {
        margin: auto;
        justify-content: center;
        padding: 10px;
    }

    .row a {
        text-decoration: none;
    }

    .card img {
        border-radius: 8px;
        max-width: 100%;
        height: auto;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .card p {
        font-weight: 600;
        color: #343a40;
    }

    /* Estilo do botão de sair */
    .btn-voltar {
        background-color: #007BFF;
        color: white;
        border: none;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s, transform 0.2s;
    }

    /* Efeito de hover no botão */
    .btn-voltar:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .btn-voltar:focus {
        outline: none;
    }

    /* Responsividade para dispositivos menores */
    @media (max-width: 768px) {
        .row {
            flex-direction: column;
        }

        .col-6 {
            width: 100%;
            margin-bottom: 15px;
        }
    }

    /* Responsividade para dispositivos maiores */
    @media (min-width: 768px) {
        .col-6 {
            width: 100%;
            margin-bottom: 15px;
        }
    }
</style>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="./home.php">
            <img src="IMG/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>

        <!-- Botão de sair posicionado no canto direito -->
        <div class="ml-auto">
            <a href="home.php">
                <button class="btn-voltar">
                    <i class="fas fa-sign-out-alt"></i> Voltar
                </button>
            </a>
        </div>
    </nav>

    <?php

    // READ
$resultado = mysqli_query($link, 'SELECT * FROM tb_usuarios');

    if (isset($_GET['id_usuario']) && $_GET['id_usuario'] == 'administrador') { ?>
        <script>
            alert('Usuário atribuido como Administrador')
            if (history.replaceState) {
                                        const url = window.location.href.split('?')[0];
                                        history.replaceState(null, null, url);
                                    }
        </script><?php
                } else if (isset($_GET['id_usuario']) && $_GET['id_usuario'] == 'usuario') { ?>
        <script>
            alert('Usuário atribuido como Usuário')
            if (history.replaceState) {
                                        const url = window.location.href.split('?')[0];
                                        history.replaceState(null, null, url);
                                    }
        </script><?php
    }?>

    <div class="container">
        <table class='table table-hover table-bordered'>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th>Autorizar</th>
            </tr>
            <?php
            while ($dados = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $dados['id_usuario'] . "</td>";
                echo "<td>" . $dados['nome'] . "</td>";
                echo "<td>" . $dados['email'] . "</td>";
                echo "<td>" . $dados['perfil'] . "</td>";
                echo "<td>
                <a href='autorizacaoRequerimento.php?id_usuario=" . $dados['id_usuario'] . "&autorizar=sim'><button id='gerenciarBtn'  class='btn btn-success'>S</button></a>
                <a href='autorizacaoRequerimento.php?id_usuario=" . $dados['id_usuario'] . "&autorizar=nao'><button id='gerenciarBtn'  class='btn btn-danger'>N</button></a>
            </td>";
                echo "</tr>";
            }


            
        echo "</table>";
        ?>
    </div>


</body>

</html>