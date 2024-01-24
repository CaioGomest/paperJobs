window.onload = function () {
    searchServs(); // EXECUTA A FUNÇÃO ASSIM QUE FOR CARREGADA A PAGINA
};


var container = $("#container-cards");

function searchServs(filter) {

    $.ajax({
        url: "functions/searchServ.php",
        type: "POST",
        data: {filter:filter},
        datatype: "json",

    }).done(function (resposta) {
        if (resposta == 0) {
            // n achou nenhum servico
            // Vo criar algum recurso frontend pra mostrar isso (DEPOIS XD)
        } else {
            // CONVERTE O JSON EM ARRAY
            const serv = jQuery.parseJSON(resposta);
            $(".card_servico").remove(); // LIMPA TODOS OS CARDS JÁ PRESENTES PRA DEPOIS ADD OS NOVOS
            for (i in serv) {
                // cria um objeto pra ser enviado como parametro pra outra function
                let servico = {
                    servico_id: serv[i]['servico_id'],
                    servico_autor: serv[i]['servico_autor'],
                    servico_titulo: serv[i]['servico_titulo'],
                    servico_descricao: serv[i]['servico_descricao'],
                    servico_valor: serv[i]['servico_valor'],
                    servico_status: serv[i]['servico_status'],
                    servico_data: serv[i]['servico_data']
                }  
                createServCard(servico);
            }
        }
    }).fail(function (textStatus) {
        //console.log("Request failed: " + textStatus);
    });
}

function createServCard(servico) {
    // A IDENTAÇÃO DEIXA TODA ESTRANHA ASSIM PRA VER MELHOR
    // POR X MOTIVO O JAVASCRIPT N DEIXA SEPARAR EM LINHAS
    // O CONTEUDO DENTRO DE ASPAS DUPLAS SEI LA PQ
    // MAS SE DER QUEBRA DE LINHA NA CONCATENAÇÃO VAI ;)
    const card = "<div class='card_servico' id_servico=" + servico['servico_id'] 
        + "><div class='card_header' style='border-bottom:1px solid black;'><div class='titulo_servico'><b>" + servico['servico_titulo'] + 
        "</b></div><div class='dono_servico'><b>Por:</b>" + servico['servico_autor'] + 
        "</div></div><div class='card_body'><span>" + servico['servico_descricao'] + 
        "</span></div><div class='card_footer'><img class='icon_ponto' src='assets/icons/Pontos.png' alt='icon_moeda'><div class='moedas_servico'><b>"
        + servico['servico_valor'] + "</b></div><div class='respostas_servico'> <b style='margin-left:10px'>!</b>" 
        + servico['servico_status'] + "</div></div></div>"
    
        container.append(card);
}