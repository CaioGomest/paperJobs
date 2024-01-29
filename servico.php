<?php
require('header.php');

$id_servico = $_REQUEST["id_servico"] ? $_REQUEST["id_servico"] : NULL;

$varfica_servico_desbloqueado = verificaServicoDesbloqueado($conn, $id_servico, $_SESSION['usuario']["usuario_id"]);
$quantos_desbloquearam_servico = verificaServicoDesbloqueado($conn, $id_servico);

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Serviço</title>
    </head>

    <body>
        <?php
        $listaServicos = listaServicos($conn, $id_servico);
        if (!empty($listaServicos)) {
            foreach ($listaServicos as $servico) {
                ?>
                <div class="container_servico">
                    <div class="container_desc_servico">
                        <div class="titulo_servico" style="text-align: left; font-size:1.5em;">
                            <b><?php echo $servico['servico_titulo']; ?></b>
                        </div>
                        <div class="autor_servico" style="margin-bottom:20px"><b>Por:
                            </b><?php echo $servico['usuario_nome']; ?></div>
                        <div class="desc_servico" style="margin:20px 0px"><?php echo $servico['servico_descricao']; ?></div>
                        <div class="dados_servico">
                            <script>
                                if (window.innerWidth >= 600) {
                                    document.write('<div class="data_post"><b>Postado em <?php echo date("d/m/Y", strtotime($servico["servico_data"])); ?></b></div>');
                                    document.write('<div class="status_servico">Este serviço já foi desbloqueado por outros <b><?php echo $quantos_desbloquearam_servico . " "; ?></b>profissionais</div>');
                                } else {
                                    document.write('<div class="data_post"><b>Postado em <?php echo date("d/m/Y", strtotime($servico["servico_data"])); ?></b></div>');
                                    document.write('<div class="status_servico">Desbloqueado por <b><?php echo $quantos_desbloquearam_servico . " "; ?></b>profissionais</div>');
                                }
                            </script>
                        </div>
                    </div>
                    <div class="container_info_servico">
                        <div class=" info_servico">
                            <div class="card_servico_detalhe" style="width:250px;"
                                id_serviço=" <?php echo $servico['servico_id']; ?>">
                                <div class="card_header" style="border-bottom:1px solid black;width:90%;">
                                    <div class="dono_servico" style="font-size:1.2em; margin:5px;">Informações</div>
                                </div>
                                <div class="card_body" style="width: 90%;">
                                    <div style="margin-top:5px;"><b> Orçamento Máximo</b></div>
                                    <div class="orcamento_max" style="margin-left: 10px;">R$
                                        <?php echo $servico['servico_orcamento_max']; ?></div>
                                    <div style="margin-top:5px;"><b>Prazo Desejado</b></div>
                                    <div class="prazo_max" style="margin-left: 10px;">
                                        <?php echo $servico['servico_prazo_max'] != null ? $servico['servico_prazo_max'] : 'Sem Prazo'; ?>
                                    </div>
                                    <div style="margin-top:5px;"><b>Tecnologias Desejadas</b></div>
                                    <div class="tecnologias_usadas" style="margin-left: 10px;">
                                        <?php echo $servico['servico_tecnologias_usadas']; ?></div>
                                </div>
                                <div class="card_footer" style="width:100%;justify-content: end;margin:5px">
                                    <div class="moedas_servico" style="margin-right:10px;"><img src="assets/icons/Pontos.png"
                                            style="margin-right:2px" alt="icon_moeda"><b>
                                            <?php echo $servico['servico_valor']; ?></b></div>

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
                <?php if ($varfica_servico_desbloqueado <= 0) { ?>
                    <div class="btn_desbloquear_servico">
                        Desbloquear
                    </div>
                <?php } else { ?>
                    <div class="btn_servico_desbloqueado">
                        Desbloqueado
                    </div>
                <?php } ?>
            </div>

        </div>
        <div class="mensagem_servico" style="font-size:1.2em; font-weight: 700;width: 100%; margin-left:50px">
            <span style="color:#7E0C00;">Não perca tempo!</span>
            <span style="color:#000;">Desbloqueie este serviço.</span>
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