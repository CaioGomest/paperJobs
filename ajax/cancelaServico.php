<?php
require('../conexao.php');
require('../functions/functions_usuarios.php');
require('../functions/functions_servicos.php');

$id_servico = isset($_REQUEST["id_servico"]) ? $_REQUEST["id_servico"] : NULL;
$id_usuario = isset($_REQUEST["id_usuario"]) ? $_REQUEST["id_usuario"] : NULL;

$listaServicos = listaServicos($conn, $id_servico);
if (!empty($listaServicos)) {
    foreach ($listaServicos as $servico) {
        $id_autor = $servico["servico_autor_id"];
    }
}
if ($id_autor == $id_usuario) {
    $cancelar_servico = alteraServicos($conn, $id_servico, null, 1);
    if ($cancelar_servico) {
        echo "true";
    } else {
        echo "false";
    }
} else
    echo "false!";