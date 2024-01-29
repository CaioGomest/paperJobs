<?php
require("header.php")
    ?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop</title>
    </head>

    <body>
        <script>
            if (window.innerWidth <= 600) {
                document.write('<img style="width: 100%;" src="assets/Banners/club mobile.svg" alt="moedas_banner">');
            }
        </script>
        <div class="shop_titulo">
            <h1>Coloque <span style="color:#A10F00;">Pontos</span> na sua conta</h1>
            <h3>Não perca nenhum serviço por falta de Shurikens</h3>
        </div>
        <div class="shop_options">
            <div class="opcoes_moedas" id="pS">
                <div class="opcoes_header">
                    <h2>Pacote Simples</h2>
                </div>
                <div class="opcoes_body">
                    <h5>Com este pacote você consegue desbloquear <b>até 3 serviços</b>.
                        Com um serviço concluído este pacote já <b>se paga e te dará lucro!</b>
                </div>
                <div class="opcoes_footer">
                    <div class="quantidade_moedas"><img class="icon_ponto" src="assets/icons/Pontos.png"
                            alt="icon_moeda"><span>500</span>
                    </div>
                    <div>por R$60,00</div>
                </div>
            </div>

            <div class="opcoes_moedas" id="pM">
                <div class="opcoes_header">
                    <h2>Pacote Médio</h2>
                </div>
                <div class="opcoes_body">
                    <h5>Com este pacote você consegue desbloquear <b> até 15 serviços.</b>
                        Compradores deste tendem a concluir <b>2 vezes</b> mais serviços
                </div>
                <div class="opcoes_footer">
                    <div class="quantidade_moedas"><img class="icon_ponto" src="assets/icons/Pontos.png"
                            alt="icon_moeda"><span>1500</span>
                    </div>
                    <div>por R$180,00</div>
                </div>
            </div>
            <div class="opcoes_moedas" id="pA">
                <div class="opcoes_header">
                    <h2>Pacote Avançado</h2>
                </div>
                <div class="opcoes_body">
                    <h5>Com este pacote você consegue desbloquear <b>até 3 serviços.</b>
                        Compradores deste pacote tendem a concluir <b>até 4 vezes mais serviços!</b>
                </div>
                <div class="opcoes_footer">
                    <div class="quantidade_moedas"><img class="icon_ponto" src="assets/icons/Pontos.png"
                            alt="icon_moeda"><span>3000</span>
                    </div>
                    <div>por R$360,00</div>
                </div>
            </div>

        </div>
        <script>
            if (window.innerWidth >= 600) {
                document.write('<div class="moedas_banner"><img src="assets/Banners/club desk.svg" alt="moedas_banner"></div>');
            }
        </script>

    </body>

</html>