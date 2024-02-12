<?php
session_start();
require('conexao.php');
require('functions/functions_usuarios.php');
require('functions/functions_servicos.php');

if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"] === null) {
    deslogar();
}


function getFileHash($file)
{
    return $file . '?v=' . rand(10000, 1000000000000);
}
getFileHash("header.php");

$usuario_dados = listarUsuarios($conn, $_SESSION["usuario"]["usuario_id"]);



if (isset($_GET["deslogar"]) && $_GET["deslogar"] == "true")
    deslogar();


$alert_mensagem_sucesso = isset($_REQUEST["alert_mensagem_sucesso"]) ? $_REQUEST["alert_mensagem_sucesso"] : NULL;
$alert_mensagem_erro = isset($_REQUEST["alert_mensagem_erro"]) ? $_REQUEST["alert_mensagem_erro"] : NULL;

if ($alert_mensagem_sucesso)
    echo "<div class='alert_mensagem_sucesso'>$alert_mensagem_sucesso</div>";
if ($alert_mensagem_erro)
    echo "<div class='alert_mensagem_erro'>$alert_mensagem_erro</div>";


?>
<script>
    function mostrarMensagem(selector) {
        var mostrarMensagem = document.querySelector(selector);
        if (mostrarMensagem) {
            setTimeout(function () {
                mostrarMensagem.classList.add("mostrar");
            }, 500);
            setTimeout(function () {
                mostrarMensagem.classList.remove("mostrar");
            }, 3000);
        }
    }

    mostrarMensagem(".alert_mensagem_sucesso");
    mostrarMensagem(".alert_mensagem_erro");
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="css/style_claro.css">
    <link rel="icon" type="image/x-icon" href="assets/logos/paperjobs">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>PaperJobs</title>
</head>
<header>
    <link rel="icon" type="image/x-icon" href="assets/logos/paperjobs">
    <div class="container_header">
        <div class="logo"><a href="home.php"><img style="width: 100px;" src="assets/logos/paperjobs.svg" alt="logo"></a>
        </div>
        <div class="moedas_usuario_mobile option_header">
            <img class="icon_ponto" src="assets/icons/Pontos.png" alt="">
            <span><?php echo $usuario_dados[0]["usuario_pontos"] ?></span>
        </div>
        <div class="menuBurguer">
            <div class="menu-btn" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
        <div class="container_option_header">
            <a href="home.php" class="option_header">Home</a>
            <a href="shop.php" class="option_header">Shop</a>
            <a href="perfil_pj.php" class="option_header">Perfis PJ</a>
            <div class="moedas_usuario option_header">
                <img class="icon_ponto" src="assets/icons/Pontos.png" alt="">
                <span><?php echo $usuario_dados[0]["usuario_pontos"] ?></span>
            </div>
            <a href="perfil.php">
                <div class="perfil_usuario option_header">
                    <img src="assets/icons/perfil.png" alt="icon_perfil">
                    <span>Perfil</span>
                    <div class="opcoes_perfil">
                        <div class="btn_modo" align="center">Modo</div>
                        <div class="btn_deslogar"
                            style="width: 100%;height: 35px;border-radius: 30px;font-size: 1em; font-weight: bold;">Sair
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
</header>
<style>
    .opcoes_perfil {
        border-radius: 15px;

        visibility: hidden;
        flex-direction: column;
        position: absolute;
        top: 55px;
        width: 75px;
        right: 5;
        background-color: #F0E9E9;
        padding: 10px;
        height: 0px;
        overflow: hidden;
    }

    .perfil_usuario:hover .opcoes_perfil {
        visibility: visible;
        transition: .2s;
        display: flex;
        height: 80px;
    }

    .opcoes_perfil:hover {
        visibility: visible;
        transition: .2s;
        display: flex;
        height: 80px;
    }


    /* Estilo dos botões */
    .opcoes_perfil .btn_modo,
    .opcoes_perfil .btn_deslogar {
        margin-bottom: 5px;
        cursor: pointer;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var perfilLink = document.querySelector(".perfil_link");
        var opcoesPerfil = document.querySelector(".opcoes_perfil");

        perfilLink.addEventListener("mouseover", function () {
            opcoesPerfil.style.display = "block";
        });

        perfilLink.addEventListener("mouseout", function () {
            opcoesPerfil.style.display = "none";
        });
    });

</script>

<body>
    <a href="criar_servico.php">
        <div class="adicionar_servico">
            <div class="linha_horizontal"></div>
            <div class="linha_vertical"></div>
        </div>
    </a>
    <div class="moda_criar_servico">
        <div class="content_modal_servico">
            <div class="modal_header">
                <label for="">Titulo Servicos</label>
                <input type="text">
            </div>
            <div class="modal_body">
                <label for="">Descriçao</label>
                <input type="text">
                <br>
                <label for="">Pontos para desbloquear</label>
                <input type="number" min="20">
                <br>
                <label for="">Pontos para desbloquear</label>
                <input type="text" min="20">
            </div>
            <div class="modal_footer"><input class="btn_criar_servico" type="submit" placeholder="Criar"></div>
        </div>
    </div>
</body>
<div class="sidebar">
    <div class="sidebar_header">
        <img class="sidebar_header_img" src="assets/iconPerfil/icon_perfil.png" alt="">
        <h3><?php echo $usuario_dados[0]["usuario_nome"] ?></h3>
    </div>
    <div class="sidebar_body">
        <div class="container_options_sidebar">
            <a href="home.php">
                <div class="options_sidebar"><b>Home</b></div>
            </a>
            <a href="perfil.php">
                <div class="options_sidebar"><b>Perfil</b></div>
            </a>
            <a href="perfil_pj.php">
                <div class="options_sidebar"><b>Perfil PJ</b></div>
            </a>
            <a href="criar_servico.php">
                <div class="options_sidebar"><b>Criar Serviço</b></div>
            </a>
            <a href="shop.php">
                <div class="options_sidebar"><b>Shop</b></div>
            </a>
        </div>
        <div class="btn_deslogar">
            <h3>Sair</h3>
        </div>
    </div>
</div>
<script src="js/javascript.js"></script>