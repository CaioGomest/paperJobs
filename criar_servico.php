<?php
require('header.php');

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
                <h2>Tudo pronto para solicitar um pedido?</h2>
                <img src="assets/icons/exclamacao.svg" alt="">
                <span>É importante deixar bem claro o seu pedido para que assim profissionais se interessem mais por
                    ele</span>

                <h3 style="margin:15px 0px;" for="Título do pedido">Título do pedido</h3>
                <select class="input_padrao" name="" id="">
                    <option value="">Desenvolvimento de Site</option>
                    <option value="">Desenvolvimento de Sistema</option>
                    <option value="">Desenvolvimento de Desing</option>
                    <option value="">Desenvolvimento de Identidade Visual</option>
                    <option value="">Prestação de serviço</option>
                </select>
                <h3 for="Descrição">Descrição <img src="assets/icons/asterisco.svg" alt=""></h3>
                <textarea class="input_padrao" style="height: 126px;" name="" id="" cols="30" rows="10"></textarea>
                <div class="infos_extra">
                    <span><b><label for="">Orçamento Máximo</label></b><img src="assets/icons/asterisco.svg"
                            alt=""></span>
                    <input class="input_padrao" type="number">
                    <span><b><label for="prazoDesejado">Prazo desejado</label></b><img src="assets/icons/asterisco.svg"
                            alt=""></span>
                    <input class="input_padrao" type="date" id="prazoDesejado">
                    <div>
                        <input type="radio" id="semPrazo" name="prazoOpcao" value="semPrazo">
                        <label for="semPrazo">Sem prazo</label>

                        <input type="radio" id="comPrazo" name="prazoOpcao" value="comPrazo">
                        <label for="comPrazo">Com prazo</label>
                    </div>
                </div>
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