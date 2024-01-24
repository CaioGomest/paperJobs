<?php
require("header.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil Provedor</title>
    </head>
    <style>
        .container_infos_perfil_provedor {
            width: 90%;
        }

        .header_infos_perfil_provedor {
            display: flex;
        }

        .nome_infos_perfil_provedor {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-left: 10px;
        }

        .nome_perfil_provedor {
            width: 90%;
            border-bottom: 1px solid black;
        }

        .body_infos_perfil_provedor h5 {
            font-weight: 400;
        }

        .btn_editar_perfil_provedor {
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-left: auto;
        }

        .btn_editar_perfil_provedor button {
            background-color: #E04737;
            border-radius: 5px;
            color: #ffffff;
            border: none;
            width: 90px;
            height: 30px;
            font-size: 1.1em;
            cursor: pointer;
        }

        .footer_infos_perfil_provedor {
            margin-top: 20px;
        }

        .area_tecnologias {
            display: flex;

        }

        .tecnologia {
            display: flex;
            align-items: center;
            justify-content: space-around;
            margin: 5px;
            width: 74px;
            height: 24px;
            flex-shrink: 0;
            border-radius: 7px;
            background: #B7B7B7;
            padding: 5px;
        }

        .x {
            width: 13px;
            height: 13px;
            cursor: pointer;
        }
    </style>

    <body>
        <div class="container_infos_perfil_provedor">
            <div class="header_infos_perfil_provedor">
                <img class="img_infos_perfil_provedor" src="assets/iconPerfil/icon_perfil.png" alt="">
                <div class="nome_infos_perfil_provedor">
                    <div class="nome_perfil_provedor">
                        <h3>Caio Gomes</h3>
                    </div>
                    <div class="area_perfil_provedor">
                        <h3><b> Area:</b> Desenvolvimento, Design, Programador, Websites, Aplica...</h3>
                    </div>
                </div>
                <div class="btn_editar_perfil_provedor">
                    <button>Editar</button>
                </div>
            </div>

            <div class="body_infos_perfil_provedor">
                <h5> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vulputate pulvinar ligula nec
                    blandit. Quisque varius scelerisque nisi, id viverra elit molestie ac. Sed quis ullamcorper purus.
                    In venenatis blandit lacus, quis luctus orci interdum et. Curabitur mauris sapien, maximus in turpis
                    vel, tincidunt condimentum mi. Sed quis nibh ac elit lacinia maximus. Aliquam erat volutpat. Aliquam
                    eget mollis tortor, ac posuere nisl. Vestibulum nec ex sapien. Morbi id dolor aliquet, tempus sapien
                    id, molestie purus. Nam efficitur purus sed nunc rhoncus, ac sagittis risus consequat. Nunc ex
                    justo, facilisis non sem sed, aliquam condimentum metus. Vestibulum tincidunt tempor massa sit amet
                    elementum. Ut hendrerit nec ante eget cursus. Mauris orci quam, ornare ac varius sed, vulputate vel
                    est.</h5>

            </div>
            <div class="footer_infos_perfil_provedor">
                <div class="tecnologias_titulo">
                    <h3>Tecnologias</h3>
                </div>
                <div class="area_tecnologias">
                    <div class="tecnologia">
                        <h3>html</h3><img class="x" src="assets/icons/x.png" alt="icon_perfil">

                    </div>
                    <div class="tecnologia">
                        <h3>css</h3><img class="x" src="assets/icons/x.png" alt="icon_perfil">

                    </div>
                    <div class="tecnologia">
                        <h3>js</h3><img class="x" src="assets/icons/x.png" alt="icon_perfil">

                    </div>
                </div>
            </div>
        </div>
        <style>
            .container_portifolio_perfil_provedor {
                width: 90%;
                margin-top: 30px;
            }

            .content_portifolio {
                background-color: gray;
                width: 30%;

            }

            .content_portifolio .img_portifolio img {
                width: 100%;
                height: 100%;
                object-fit: scale-down;
                /* ou qualquer outro valor que desejar */
            }
        </style>
        <div class="container_portifolio_perfil_provedor">
            <h3>Portfolio</h3>
            <div class="content_portifolio">
                <div class="info_portifolio">
                    <div class="titulo_portifolio">FACEBOOK</div>
                    <div class="img_portifolio">
                        <img src="assets/banners/Banner.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="js/javascript.js"></script>

</html>