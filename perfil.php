<?php
require("header.php");

$deslogar = isset($_REQUEST["deslogar"]) ? $_REQUEST["deslogar"] : null;
if (isset($deslogar)) {
    deslogar();
}

$atualizar = isset($_REQUEST['atualizar']) ? $_REQUEST['atualizar'] : false;

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil do Usuário</title>
    </head>

    <body>
        <div class="toggle" onclick="openCloseSideMenu()"
            style="margin:10px; position:absolute; float:left; float: left;">
            <a href="#" id="burguer" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>
        </div>
        <div class="container-perfil">
            <div class="container-info-perfil" id="container-info-perfil">
                <img class="perfil_img" src="assets/iconPerfil/icon_perfil.png" alt="">
                <h2 class='usuario-nome'><?php echo $_SESSION['usuario']["usuario_nome"]; ?></h2>
                <h3 class='usuario-tipo'><?php echo $_SESSION['usuario']["usuario_email"]; ?></h3>
            </div>
            <div class="main">
                <div class="informacoes-perfil-selecionado">
                    <form action="" method='POST' class="container-atualizar_usuario">
                        <div class="containers-inputs">
                            <label for="">Nome</label><br>
                            <input class="usuario-input usuario_nome" <?php echo $atualizar == true ? "" : ' disabled'; ?>
                                value="<?php echo $_SESSION['usuario']["usuario_nome"]; ?>" type="text"
                                name="usuario_nome" id="">
                        </div>
                        <div class="containers-inputs">
                            <label for="">Email</label><br>
                            <input class="usuario-input usuario_email" <?php echo $atualizar == true ? "" : ' disabled'; ?>
                                value="<?php echo $_SESSION['usuario']["usuario_email"]; ?>" type="email"
                                name="usuario_email" id="">
                        </div>
                        <div class="containers-inputs">
                            <label for="">Número</label><br>
                            <input class="usuario-input usuario_numero" <?php echo $atualizar == true ? "" : ' disabled'; ?>
                                value="<?php echo $_SESSION['usuario']["usuario_numero"]; ?>" type="text"
                                name="usuario_numero" id="telefone">
                        </div>
                        <div class="containers-inputs">
                            <label for="">Senha</label><br>
                            <input class="usuario-input usuario_senha" disabled style="color:black" type="password"
                                name="usuario_senha" placeholder="Senha!" id="">
                        </div>
                        <form id="perfilForm" action="perfil.php" method="GET">
                            <div class="btns"
                                style="display:flex; width:100%;justify-content: center;margin-top: 15px;">

                                <?php if ($atualizar == false) {
                                    ?>
                                    <input class="btn_atualizar_usuario" type="button" name="atualizar" value="Atualizar">
                                <?php } ?>

                                <?php if ($atualizar == true) { ?>
                                    <input class="btn_cancelar_usuario" type="button" name="cancelar" value="cancelar">
                                    <input class="btn_salvar_usuario" type="button" name="salvar" value="salvar">

                                <?php } ?>

                            </div>
                        </form>
                    </form>
                </div>

            </div>
        </div>
        <div class="container_servicos" style="margin-top:25px;">
            <div class="titulo_servicos">
                <h4>Meus Pedidos de Serviços</h4>
            </div>
            <div class="filtros">
                <li><b>Filtrar</b></li>
            </div>
            <div class="container_cards_servicos">
                <?php
                $listaServicos = listaServicos($conn, null, $_SESSION['usuario']["usuario_id"], null, null, null, 'DESC');
                if (!empty($listaServicos)) {
                    foreach ($listaServicos as $servico) {
                        $varfica_servico_desbloqueado = verificaServicoDesbloqueado($conn, $servico['servico_id'], $_SESSION['usuario']["usuario_id"]);
                        ?>
                        <div class="card_servico" id_serviço="<?php echo $servico['servico_id']; ?>">
                            <div class="card_header" style="border-bottom:1px solid black;">
                                <div class="titulo_servico"><b> <?php echo $servico['servico_titulo']; ?></b></div>
                                <div class="dono_servico"><b>Por:</b><?php echo " " . $servico['usuario_nome']; ?></div>
                            </div>
                            <div class="card_body">
                                <span>
                                    <?php
                                    // Limitar a descrição a 20 palavras
                                    $descricao = $servico['servico_descricao'];
                                    $palavras = explode(' ', $descricao);
                                    if (count($palavras) > 8) {
                                        $descricao = implode(' ', array_slice($palavras, 0, 15)) . '...';
                                    }
                                    echo $descricao;
                                    ?>
                                </span>
                            </div>
                            <div class="card_footer" style="justify-content: space-between;">

                                <div class="moedas_servico">
                                    <img class="icon_ponto" src="assets/icons/Pontos.png" alt="icon_moeda"><b>
                                        <?php echo $servico['servico_valor']; ?></b>
                                </div>

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
        </div>
        <script>
            $(".btn_salvar_usuario").click(function () {

                var senha = $(".usuario_senha").val();
                var numero = $(".usuario_numero").val();
                var email = $(".usuario_email").val();
                var nome = $(".usuario_nome").val();

                $.ajax({
                    type: "POST",
                    url: "ajax/ajax_atualiza_usuario.php",
                    data:
                    {
                        id_usuario: "<?php echo $_SESSION['usuario']["usuario_id"]; ?>",
                        senha:senha,
                        numero:numero,
                        email:email,
                        nome:nome
                    },
                    success: function (response) {
                        window.location.href = window.location.href + "&" + "alert_mensagem_sucesso=Sucesso ao Atualizar Dados";
                    },
                    error: function (xhr, status, error) {
                        window.location.href = window.location.href + "&" + "alert_mensagem_erro=Erro ao Atualizar Dados";
                    }
                });
            });

            var telefoneInput = document.getElementById('telefone');
            validacaoInputTelefone(telefoneInput);
        </script>
    </body>

</html>