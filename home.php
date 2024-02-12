<?php
require('conexao.php');
require('header.php');

$filtrar = isset($_GET['filtrar']) ? $_GET['filtrar'] : null;
$tipo_servico = isset($_GET['tipo_servico']) ? $_GET['tipo_servico'] : null;
$status_servico = isset($_GET['status_servico']) ? $_GET['status_servico'] : null;
$order_by = isset($_GET['data_servico']) ? $_GET['data_servico'] : null;

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
                </di v>
                </di v>
                <div class="container_servicos">
                    <div class="titulo_servicos">
                        <h4>Serviços</h4>
                    </div>
                    <div class="filtros">
                        <div class="btn_ativa_modal"><b>Filtrar</b></div>
                        <li>Perto de Mim</li>
                        <li>Novos Pedidos</li>
                        <li>Ainda Buscando</li>
                    </div>
                    <div class="container_cards_servicos">
                        <?php
                        if ($filtrar == true)
                            $listaServicos = listaServicos($conn, NULL, NULL, null, $tipo_servico, null, $order_by, NULL, 0);
                        else
                            $listaServicos = listaServicos($conn, null, null, null, null, null, 'DESC', null, 0);
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
                                            if (count($palavras) > 8) {
                                                $descricao = implode(' ', array_slice($palavras, 0, 15)) . '...';
                                            }
                                            echo $descricao;
                                            ?> </span></div>
                                    <div class="card_footer">

                                        <!-- <div class="moedas_servico">
                                    <img class="icon_ponto" src="assets/icons/Pontos.png" alt="icon_moeda"><b>
                                        <?php //echo $servico['servico_valor']; ?></b>
                                </div> -->

                                        <?php if ($_SESSION['usuario']["usuario_id"] == $servico['servico_autor_id']) { ?>
                                            <div class="respostas_servico" style="background-color:#ffa600;"> <span> !
                                                    <?php echo "Detalhes do meu Serviço" ?></span>
                                            </div>
                                        <?php } else if ($varfica_servico_desbloqueado <= 0) { ?>
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
                    <div class="container_modal"></div>
                    <div class="modal">
                        <div class="modal_header"><b>Filtrar Serviços</b>
                            <div class="close_modal">X</div>
                        </div>
                        <div class="modal_body">
                            <form id="filtro_form_home" action="home.php" method="GET"
                                style="display:flex;flex-direction: column;">
                                <label for="tipo_servico">Tipo de serviço:</label>
                                <select name="tipo_servico" class="input_padrao" id="tipo_servico">
                                    <option value=""></option>
                                    <?php
                                    $tipoServicos = listaTiposServicos($conn);
                                    foreach ($tipoServicos as $tipoServico) {
                                        ?>
                                        <option value="<?php echo $tipoServico['servico_tipo_id']; ?>">
                                            <?php echo $tipoServico['servico_tipo_nome']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                                <label for="status_servico">Status do Serviço:</label>
                                <select name="status_servico" class="input_padrao" id="status_servico">
                                    <option value=""></option>
                                    <option value="Desbloquear">Desbloquear</option>
                                    <option value="Meus Serviços">Meus Serviços</option>
                                    <option value="Desbloqueados">Desbloqueados</option>
                                </select>

                                <label for="data_servico">Data:</label>
                                <select class="input_padrao" name="data_servico" id="data_servico">
                                    <option value="DESC">Mais recente</option>
                                    <option value="ASC">Mais Antigo</option>
                                </select>
                                <input hidden type="text" name="filtrar" value="true">
                        </div>
                        <div class="modal_footer">
                            <div class="btn_modal">Cancelar</div>
                            <div class="btn_modal btn_modal_filtrar" id="btn_filtrar_home">Filtrar</div>
                        </div>
                        </form>
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