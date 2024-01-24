<?php
require('conexao.php');
require('header.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

    <body>
        <div class="container_banner">
            <div class="banner">
                <script>
                    if (window.innerWidth <= 600) {
                        document.write('<img src="assets/Banners/Banner mobile.svg" alt="banner">');
                    } else {
                        document.write('<img src="assets/Banners/Banner.svg" alt="banner">');
                    }
                </script>
            </div>
        </div>
        <div class="container_servicos">
            <div class="titulo_servicos">
                <h4>Serviços</h4>
            </div>
            <div class="filtros">
                <li><b>Filtrar</b></li>
                <li>Perto de Mim</li>
                <li>Novos Pedidos</li>
                <li>Ainda Buscando</li>
            </div>
            <div class="container_cards_servicos">
                <?php
                $listaServicos = listaServicos($conn);
                if (!empty($listaServicos)) {
                    foreach ($listaServicos as $servico) {
                        $varfica_servico_desbloqueado = verificaServicoDesbloqueado($conn, $servico['servico_id'], $_SESSION['usuario']["usuario_id"]);
                        ?>
                        <div class="card_servico" id_serviço="<?php echo $servico['servico_id']; ?>">
                            <div class="card_header" style="border-bottom:1px solid black;">
                                <div class="titulo_servico"><b> <?php echo $servico['servico_titulo']; ?></b></div>
                                <div class="dono_servico"><b>Por:</b><?php echo " " . $servico['usuario_nome']; ?></div>
                            </div>
                            <div class="card_body"><span>
                                    <?php
                                    // Limitar a descrição a 20 palavras
                                    $descricao = $servico['servico_descricao'];
                                    $palavras = explode(' ', $descricao);
                                    if (count($palavras) > 15) {
                                        $descricao = implode(' ', array_slice($palavras, 0, 15)) . '...';
                                    }
                                    echo $descricao;
                                    ?> </span></div>
                            <div class="card_footer">

                                <!-- <div class="moedas_servico">
                                    <img class="icon_ponto" src="assets/icons/Pontos.png" alt="icon_moeda"><b>
                                        <?php //echo $servico['servico_valor']; ?></b>
                                </div> -->

                                <?php if ($varfica_servico_desbloqueado <= 0) { ?>
                                    <div class="respostas_servico"> <span> !
                                            <?php echo $servico['servico_status_nome']; ?></span>
                                    </div>
                                <?php } else { ?>
                                    <div class="respostas_servico" style="background-color: #189200;font-size: 1.3em;"> <b
                                            style="margin-left:10px">
                                        </b><?php echo "Desbloqueado" ?>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>

                        <?php
                    }
                } else {
                    ?>

                    <h4>Nenhum Serviço encontrado!</h4>

                    <?php
                } ?>

            </div>
    </body>
    <script>
        $(".btn_desbloquear_servico").click(function () {

            var quantidadePontosNecessarios = '<?php echo $servico['servico_valor']; ?>';
            $.ajax({
                type: "POST",
                url: "ajax/ajax_verifica_moedas_suficientes.php",
                data: {
                    id_servico: "<?php echo $id_servico ?>",
                    id_usuario: "<?php echo $_SESSION['usuario']["usuario_id"]; ?>"
                },
                success: function (response) {

                    if (response == "true") {
                        alert('deu certo');
                        window.location.reload();

                    }

                    else if (response == "insuficiente") {
                        alert("pontos insuficiente");
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    </script>

</html>