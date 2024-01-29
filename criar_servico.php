<?php
require('header.php');

$titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : null;
$descricao = isset($_REQUEST['descricao']) ? $_REQUEST['descricao'] : null;
$moedas_desbloquear = isset($_REQUEST['moedas_desbloquear']) ? $_REQUEST['moedas_desbloquear'] : null;
$orcamento_max = isset($_REQUEST['orcamento_max']) ? $_REQUEST['orcamento_max'] : null;
$tecnologias_usadas = isset($_REQUEST['tecnologias_usadas']) ? $_REQUEST['tecnologias_usadas'] : null;
$prazo_max = isset($_REQUEST['prazo_max']) ? $_REQUEST['prazo_max'] : null;
$contato = isset($_REQUEST['contato']) ? $_REQUEST['contato'] : null;

if ($titulo) {
    $criar_servico = criaServico($conn, $_SESSION["usuario"]["usuario_id"], $titulo, $descricao, $moedas_desbloquear, 0, $orcamento_max, $tecnologias_usadas, $prazo_max, $contato);

    if ($criar_servico)
        echo "SERVIÇO CRIADOOOO";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Criar Serviço</title>
    </head>
    <style>
        .input_padrao {

            border-radius: 5px;
            border: solid black 1px;
            height: 30px;
            margin-bottom: 10px;
        }

        .infos_extra {
            display: flex;
            width: 350px;
            flex-direction: column;
        }
    </style>

    <body>
        <div class="container_criar_servico">
            <div class="formulario_servico">
                <form id="criar_servico" action="" method="GET">
                    <h2>Tudo pronto para solicitar um pedido?</h2>
                    <img src="assets/icons/exclamacao.svg" alt="">
                    <span>É importante deixar bem claro o seu pedido para que assim profissionais se interessem mais por
                        ele</span>

                    <h3 style="margin:15px 0px;" for="Título do pedido">Título do pedido</h3>
                    <select class="input_padrao" name="titulo" id="">
                        <option value="Desenvolvimento de Site">Desenvolvimento de Site</option>
                        <option value="Desenvolvimento de Sistema">Desenvolvimento de Sistema</option>
                        <option value="Desenvolvimento de Design">Desenvolvimento de Design</option>
                        <option value="Desenvolvimento de Identidade Visual">Desenvolvimento de Identidade Visual
                        <option value="Desenvolvimento de Identidade Visual">Manutenção de Software
                        <option value="Desenvolvimento de Identidade Visual">Assessoria
                        <option value="Desenvolvimento de Identidade Visual">Consulta
                        </option>
                        <option value="Prestação de serviço">Prestação de serviço</option>
                    </select>

                    <h3 for="Descrição">Descrição <img src="assets/icons/asterisco.svg" alt=""></h3>
                    <textarea class="input_padrao" style="height: 126px;" name="descricao" id="" cols="30"
                        rows="10"></textarea>
                    <div class="infos_extra">
                        <span><b><label for="">Tecnologias que serão usadas</label></b><img
                                src="assets/icons/asterisco.svg" alt=""></span>
                        <input class="input_padrao" name="tecnologias_usadas" type="text">
                        <span><b><label for="">Orçamento
                                    Máximo</label></b><img src="assets/icons/asterisco.svg" alt=""></span>
                        <input class="input_padrao" name="orcamento_max" type="number">
                        <span><b><label for="prazoDesejado">Prazo desejado</label></b><img
                                src="assets/icons/asterisco.svg" alt=""></span>
                        <input class="input_padrao" type="date" name="prazo_max" id="prazoDesejado">
                        <div style="margin-bottom:10px" class="prazo">
                            <input type="radio" id="semPrazo" value="semPrazo">
                            <label for="semPrazo">Sem prazo</label>

                            <input type="radio" id="comPrazo" value="comPrazo">
                            <label for="comPrazo">Com prazo</label>
                        </div>
                        <label for=""><b>Quantidade de Moedas para Desbloquear</b></label>
                        <input class="input_padrao" name="moedas_desbloquear" type="number">

                        <label for=""><b>Contatos</b></label>
                        <input class="input_padrao" name="Contatos" type="text">
                    </div>

                </form>
            </div>


            <div class="container_info_servico" style="justify-content: center;">
                <div class=" info_servico" style="display: contents;">
                    <div class="card_servico_detalhe" style="width:250px;" id_serviço="">
                        <div class="card_header" style="border-bottom:1px solid black;width:90%;">
                            <div class="dono_servico" style="font-size:1.2em; margin:5px;">Informações</div>
                        </div>
                        <div class="card_body" style="width: 90%;">
                            <div style="margin-top:5px;">Orçamento Máximo</div>
                            <div class="orcamento_max" style="margin-left: 10px;"><b>R$
                                </b></div>
                            <div style="margin-top:5px;">Prazo Desejado</div>
                            <div class="prazo_max" style="margin-left: 10px;">
                            </div>
                            <div style="margin-top:5px;">Tecnologias Desejadas</div>
                            <div class="tecnologias_usadas" style="margin-left: 10px;">
                            </div>
                        </div>
                        <div class="card_footer" style="width:100%;justify-content: end;margin:5px">
                            <div class="moedas_servico" style="margin-right:10px;"><img src="assets/icons/Pontos.png"
                                    style="margin-right:2px" alt="icon_moeda"><b>
                                </b></div>

                        </div>
                    </div>

                    <div class="btn_servico_publicar">
                        Publicar
                    </div>
                </div>

            </div>
    </body>
    <style>
        .container_criar_servico {
            display: flex;
            width: 90%;
            justify-content: space-between;
        }

        .formulario_servico {
            width: 70%;
        }
    </style>

</html>