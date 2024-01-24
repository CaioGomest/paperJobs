<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();

function criaServico($conn, $autor_id = NULL, $titulo = NULL, $descricao = NULL, $valor = NULL, $status = NULL, $orcamento_max = NULL, $tecnologias_usadas = NULL, $prazo_max = NULL, $contato = NULL)
{
    $query = "INSERT INTO servicos (servico_autor_id, servico_titulo,
                            servico_descricao, servico_valor, servico_status,
                            servico_orcamento_max, servico_tecnologias_usadas, 
                            servico_prazo_max, servico_contato) 
              VALUES ('" . mysqli_real_escape_string($conn, $autor_id) . "', 
                      '" . mysqli_real_escape_string($conn, $titulo) . "', 
                      '" . mysqli_real_escape_string($conn, $descricao) . "', 
                      '" . mysqli_real_escape_string($conn, $valor) . "', 
                      '" . mysqli_real_escape_string($conn, $status) . "', 
                      '" . mysqli_real_escape_string($conn, $orcamento_max) . "', 
                      '" . mysqli_real_escape_string($conn, $tecnologias_usadas) . "', 
                      '" . mysqli_real_escape_string($conn, $prazo_max) . "', 
                      '" . mysqli_real_escape_string($conn, $contato) . "')";

    $result = mysqli_query($conn, $query);

    if ($result !== FALSE) {
        return mysqli_insert_id($conn); // Retorna o ID do serviço inserido
    } else {
        return "ERRO: " . mysqli_error($conn);
    }
}



function listaServicos($conn, $id = NULL, $servico_autor_id = NULL, $titulo = NULL, $tipo = NULL, $status = NULL, $order_by = NULL, $limite = NULL)
{
    $query = "SELECT servicos.*, usuarios.usuario_nome, servicos_status.servico_status_nome, servicos_status.servico_status_quantidade_desbloqueado FROM servicos 
              INNER JOIN servicos_status ON servicos.servico_status = servicos_status.servico_status_id
              INNER JOIN usuarios ON servicos.servico_autor_id = usuarios.usuario_id WHERE 1=1 ";

    // WHERE
    if (is_numeric($id))
        $query .= " AND servico_id = " . mysqli_real_escape_string($conn, $id);

    if (is_numeric($servico_autor_id))
        $query .= " AND servico_autor_id = " . mysqli_real_escape_string($conn, $servico_autor_id);

    if (!empty($titulo))
        $query .= " AND servico_nome LIKE '%" . mysqli_real_escape_string($conn, $titulo) . "%'";

    if (!empty($tipo))
        $query .= " AND servico_nome LIKE '%" . mysqli_real_escape_string($conn, $titulo) . "%'";

    if (!empty($status))
        $query .= " AND servico_nome LIKE '%" . mysqli_real_escape_string($conn, $titulo) . "%'";

    if (!empty($order_by))
        $query .= sprintf(" ORDER BY %s ", mysqli_real_escape_string($conn, $order_by));
    //echo $query;

    $result = mysqli_query($conn, $query);

    if ($result !== FALSE)
        return $result;
    else
        return "ERRO: " . mysqli_error($conn);
}
function totalServicos($conn, $titulo = NULL, $cliente_id = NULL, $tipo = NULL, $status = NULL)
{
    $query = "SELECT COUNT(1) FROM servico WHERE 1 = 1";

    if (!empty($titulo))
        $query .= " AND servico_nome LIKE '%" . mysqli_real_escape_string($conn, $titulo) . "%'";

    if (!empty($cliente_id) && is_numeric($cliente_id))
        $query .= sprintf(" AND servico_id = %d ", mysqli_real_escape_string($conn, $cliente_id));

    if (!empty($tipo) && is_numeric($tipo))
        $query .= sprintf(" AND servico_tipo = %d ", mysqli_real_escape_string($conn, $tipo));

    if (is_numeric($status))
        $query .= sprintf(" AND servico_bloqueado = %d ", mysqli_real_escape_string($conn, $status));

    $result = mysqli_query($conn, $query);

    if ($result !== FALSE) {
        $count = mysqli_fetch_all_mod($result, MYSQLI_BOTH);
        return $count[0][0];
    } else
        return "ERRO: " . mysqli_error($conn);
}
function alteraServicos($conn, $id, $titulo)
{
    $query = sprintf(
        "UPDATE servico SET servico_nome = '%s'",
        mysqli_escape_string($conn, $titulo),

    );

    $query .= sprintf(" WHERE servico_id = %d", mysqli_escape_string($conn, $id));

    //echo $query;
    if (mysqli_query($conn, $query))
        return true;
    else
        return " ERRO: " . mysqli_error($conn);
}
function desbloquearServico($conn, $id_usuario, $id_servico, $pontos_necessarios, $pontos_usuario)
{
    $varfica_servico_desbloqueado = verificaServicoDesbloqueado($conn, $id_servico, $id_usuario);
    if ($varfica_servico_desbloqueado == 0) {
        if ($pontos_usuario >= $pontos_necessarios) {
            $pontos_restante_usuario = $pontos_usuario - $pontos_necessarios;

            $usuario_atualizado = atualizarUsuario($conn, $id_usuario, NULL, NULL, NULL, $pontos_restante_usuario);
            registraServicoDesbloqueado($conn, $id_servico, $id_usuario);
            return $usuario_atualizado;
        } else {
            return 'insuficiente';
        }
    }
}
function registraServicoDesbloqueado($conn, $id_servico, $id_usuario)
{
    $query = "INSERT INTO servicos_desbloqueados (servico_id, usuario_id) VALUES ($id_servico, $id_usuario)";

    //echo $query;
    $result = mysqli_query($conn, $query);

    if ($result !== FALSE) {

        return true;
    } else {
        return "ERRO: " . mysqli_error($conn);
    }
}
function verificaServicoDesbloqueado($conn, $id_servico, $id_usuario = null)
{
    $query = "SELECT count(1) as count FROM servicos_desbloqueados WHERE servico_id = $id_servico ";

    if (is_numeric($id_usuario))
        $query .= " AND usuario_id = " . mysqli_real_escape_string($conn, $id_usuario);

    //echo $query;
    $result = mysqli_query($conn, $query);

    if ($result !== FALSE) {
        $row = mysqli_fetch_assoc($result);
        return $row["count"]; // Retorna o valor da contagem
    } else {
        return "ERRO: " . mysqli_error($conn);
    }
}
