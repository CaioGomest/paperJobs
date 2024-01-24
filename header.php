<?php
session_start();
require('conexao.php');
require('functions/functions_usuarios.php');
require('functions/functions_servicos.php');

$usuario_dados = listarUsuarios($conn, $_SESSION["usuario"]["usuario_id"]);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="css/style_claro.css">
    <link rel="icon" type="image/x-icon" href="assets/logos/paperjobs">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>PaperJobs</title>
</head>
<header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

            <a href="servicos.php" class="option_header">Serviços</a>
            <div class="moedas_usuario option_header">
                <img class="icon_ponto" src="assets/icons/Pontos.png" alt="">
                <span><?php echo $usuario_dados[0]["usuario_pontos"] ?></span>
            </div>
            <a href="perfil.php">
                <div class="perfil_usuario option_header">
                    <img src="assets/icons/perfil.png" alt="icon_perfil">
                    <span>Perfil</span>
                </div>
            </a>
        </div>
    </div>
</header>

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
    <div class="sidebar_header"></div>
    <div class="sidebar_body"></div>
    <div class="sidebar_footer"></div>
</div>
<script src="js/javascript.js"></script>