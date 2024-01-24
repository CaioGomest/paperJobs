<?php
require("header.php");

$deslogar = isset($_REQUEST["deslogar"]) ? $_REQUEST["deslogar"] : null;
if (isset($deslogar)) {
    deslogar();
}
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
        <div class="container-info-perfil" id="container-info-perfil">
            <img src='../../imgs/user.png' alt=''>
            <h2 class='usuario-nome'><?php echo $_SESSION['usuario']["usuario_nome"]; ?></h2>
            <h3 class='usuario-tipo'><?php echo $_SESSION['usuario']["usuario_email"]; ?></h3>
        </div>
        <div class="main">
            <div class="informacoes-perfil-selecionado">
                <form action="" method='POST' class="container-atualizar_usuario">
                    <div class="containers-inputs">
                        <label for="">Nome</label>
                        <input class="usuario-input" disabled
                            value="<?php echo $_SESSION['usuario']["usuario_nome"]; ?>" type="text" name="usuario_nome"
                            id="">
                    </div>
                    <div class="containers-inputs">
                        <label for="">Email</label>
                        <input class="usuario-input" disabled
                            value="<?php echo $_SESSION['usuario']["usuario_email"]; ?>" type="email"
                            name="usuario_email" id="">
                    </div>
                    <div class="containers-inputs">
                        <label for="">Número</label>
                        <input class="usuario-input" disabled
                            value="<?php echo $_SESSION['usuario']["usuario_numero"]; ?>" type="text"
                            name="usuario_numero" id="">
                    </div>
                    <div class="containers-inputs">
                        <label for="">Senha</label>
                        <input class="usuario-input senha" disabled style="color:black" type="password"
                            name="usuario_senha" placeholder="Senha!" id="">
                    </div>
                    <div class="btns" style="display:flex; width:90%">
                        <input class="atualizar-usuario" type="button" value="Atualizar">
                        <input class="cancelar btn-cancelar" style="width: 49.5%; display: none; background-color:red;"
                            type="button" value="Cancelar">
                        <input class="salvar-usuario" style="width: 49.50%; display: none" type="submit" value="Salvar">
                    </div>
                </form>
                <form action="">
                    <input type="hidden" name="deslogar" value="true">
                    <input type="submit" value="Deslogar">
                </form>
                <button class="btn_modal_criar_servico">Inserir Serviço</button>

            </div>

            <div class="container_servicos">
                <div class="titulo_servicos">
                    <h4>Meus Pedidos de Serviços</h4>
                </div>
                <div class="filtros">
                    <li><b>Filtrar</b></li>
                </div>
                <div class="container_cards_servicos">
                    <?php
                    $listaServicos = listaServicos($conn, null, $_SESSION['usuario']["usuario_id"]);
                    if (!empty($listaServicos)) {
                        foreach ($listaServicos as $servico) {
                            ?>

                            <div class="card_servico" id_serviço="<?php echo $servico['servico_id']; ?>">
                                <div class="card_header" style="border-bottom:1px solid black;">
                                    <div class="titulo_servico"><b> <?php echo $servico['servico_titulo']; ?></b></div>
                                    <div class="dono_servico"><b>Por:</b><?php echo " " . $servico['usuario_nome']; ?></div>
                                </div>
                                <div class="card_body"><span>
                                        <?php echo $servico['servico_descricao']; ?>
                                    </span></div>
                                <div class="card_footer">
                                    <img src="assets/icons/Pontos.png" alt="icon_moeda">
                                    <div class="moedas_servico"><b> <?php echo $servico['servico_valor']; ?></b></div>
                                    <div class="respostas_servico"> <b style="margin-left:10px">!
                                        </b><?php echo $servico['servico_status_nome']; ?>

                                    </div>
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
    </body>

</html>