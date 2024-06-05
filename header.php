<?php
session_start();
require ('conexao.php');
require ('functions/functions_usuarios.php');
require ('functions/functions_servicos.php');

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
    echo '<div class="success">
                <div class="success__icon">
                    <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z" fill="#393a37"></path></svg>
                </div>
                <div class="success__title">Mensagem de sucesso!</div>
                <div class="success__close">
                    <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M6 6L18 18M6 18L18 6L6 18Z" stroke="#285238" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
            </div>
            ';


if ($alert_mensagem_erro)
    echo '<div class="error">
            <div class="error__icon">
                <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z" fill="#393a37"></path></svg>
            </div>
            <div class="error__title">' .$alert_mensagem_erro.'</div>
        </div>';

?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var successAlert = document.querySelector('.success');

    // Mostrar o alerta com a animação
    setTimeout(function() {
        successAlert.classList.remove('hide');
        successAlert.classList.add('show');
    }, 100); // Aguarda 100ms para garantir que a página carregou

    // Esconder o alerta após 5 segundos
    setTimeout(function() {
        successAlert.classList.add('hide');
    }, 5100); // Aguarda 5100ms (100ms para mostrar + 5000ms de exibição)

    // Adicionar evento de clique para o botão de fechar
    var closeButton = document.querySelector('.success__close');
    closeButton.addEventListener('click', function() {
        successAlert.classList.add('hide');
    });
});

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
            <label class="theme-switch">
                <input type="checkbox" class="theme-switch__checkbox">
                <div class="theme-switch__container">
                    <div class="theme-switch__clouds"></div>
                    <div class="theme-switch__stars-container">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 55" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M135.831 3.00688C135.055 3.85027 134.111 4.29946 133 4.35447C134.111 4.40947 135.055 4.85867 135.831 5.71123C136.607 6.55462 136.996 7.56303 136.996 8.72727C136.996 7.95722 137.172 7.25134 137.525 6.59129C137.886 5.93124 138.372 5.39954 138.98 5.00535C139.598 4.60199 140.268 4.39114 141 4.35447C139.88 4.2903 138.936 3.85027 138.16 3.00688C137.384 2.16348 136.996 1.16425 136.996 0C136.996 1.16425 136.607 2.16348 135.831 3.00688ZM31 23.3545C32.1114 23.2995 33.0551 22.8503 33.8313 22.0069C34.6075 21.1635 34.9956 20.1642 34.9956 19C34.9956 20.1642 35.3837 21.1635 36.1599 22.0069C36.9361 22.8503 37.8798 23.2903 39 23.3545C38.2679 23.3911 37.5976 23.602 36.9802 24.0053C36.3716 24.3995 35.8864 24.9312 35.5248 25.5913C35.172 26.2513 34.9956 26.9572 34.9956 27.7273C34.9956 26.563 34.6075 25.5546 33.8313 24.7112C33.0551 23.8587 32.1114 23.4095 31 23.3545ZM0 36.3545C1.11136 36.2995 2.05513 35.8503 2.83131 35.0069C3.6075 34.1635 3.99559 33.1642 3.99559 32C3.99559 33.1642 4.38368 34.1635 5.15987 35.0069C5.93605 35.8503 6.87982 36.2903 8 36.3545C7.26792 36.3911 6.59757 36.602 5.98015 37.0053C5.37155 37.3995 4.88644 37.9312 4.52481 38.5913C4.172 39.2513 3.99559 39.9572 3.99559 40.7273C3.99559 39.563 3.6075 38.5546 2.83131 37.7112C2.05513 36.8587 1.11136 36.4095 0 36.3545ZM56.8313 24.0069C56.0551 24.8503 55.1114 25.2995 54 25.3545C55.1114 25.4095 56.0551 25.8587 56.8313 26.7112C57.6075 27.5546 57.9956 28.563 57.9956 29.7273C57.9956 28.9572 58.172 28.2513 58.5248 27.5913C58.8864 26.9312 59.3716 26.3995 59.9802 26.0053C60.5976 25.602 61.2679 25.3911 62 25.3545C60.8798 25.2903 59.9361 24.8503 59.1599 24.0069C58.3837 23.1635 57.9956 22.1642 57.9956 21C57.9956 22.1642 57.6075 23.1635 56.8313 24.0069ZM81 25.3545C82.1114 25.2995 83.0551 24.8503 83.8313 24.0069C84.6075 23.1635 84.9956 22.1642 84.9956 21C84.9956 22.1642 85.3837 23.1635 86.1599 24.0069C86.9361 24.8503 87.8798 25.2903 89 25.3545C88.2679 25.3911 87.5976 25.602 86.9802 26.0053C86.3716 26.3995 85.8864 26.9312 85.5248 27.5913C85.172 28.2513 84.9956 28.9572 84.9956 29.7273C84.9956 28.563 84.6075 27.5546 83.8313 26.7112C83.0551 25.8587 82.1114 25.4095 81 25.3545ZM136 36.3545C137.111 36.2995 138.055 35.8503 138.831 35.0069C139.607 34.1635 139.996 33.1642 139.996 32C139.996 33.1642 140.384 34.1635 141.16 35.0069C141.936 35.8503 142.88 36.2903 144 36.3545C143.268 36.3911 142.598 36.602 141.98 37.0053C141.372 37.3995 140.886 37.9312 140.525 38.5913C140.172 39.2513 139.996 39.9572 139.996 40.7273C139.996 39.563 139.607 38.5546 138.831 37.7112C138.055 36.8587 137.111 36.4095 136 36.3545ZM101.831 49.0069C101.055 49.8503 100.111 50.2995 99 50.3545C100.111 50.4095 101.055 50.8587 101.831 51.7112C102.607 52.5546 102.996 53.563 102.996 54.7273C102.996 53.9572 103.172 53.2513 103.525 52.5913C103.886 51.9312 104.372 51.3995 104.98 51.0053C105.598 50.602 106.268 50.3911 107 50.3545C105.88 50.2903 104.936 49.8503 104.16 49.0069C103.384 48.1635 102.996 47.1642 102.996 46C102.996 47.1642 102.607 48.1635 101.831 49.0069Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                    <div class="theme-switch__circle-container">
                        <div class="theme-switch__sun-moon-container">
                            <div class="theme-switch__moon">
                                <div class="theme-switch__spot"></div>
                                <div class="theme-switch__spot"></div>
                                <div class="theme-switch__spot"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </label>
            <a href="perfil.php">
                <div class="perfil_usuario option_header">
                    <img src="assets/icons/perfil.png" alt="icon_perfil">
                    <span>Perfil</span>
                    <div class="opcoes_perfil">
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
document.addEventListener("DOMContentLoaded", function() {
    var perfilLink = document.querySelector(".perfil_link");
    var opcoesPerfil = document.querySelector(".opcoes_perfil");

    perfilLink.addEventListener("mouseover", function() {
        opcoesPerfil.style.display = "block";
    });

    perfilLink.addEventListener("mouseout", function() {
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