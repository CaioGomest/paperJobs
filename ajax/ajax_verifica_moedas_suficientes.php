<?php
require('../conexao.php');
require('../functions/functions_usuarios.php');
require('../functions/functions_servicos.php');

$id_servico = isset($_REQUEST["id_servico"]) ? $_REQUEST["id_servico"] : NULL;
$id_usuario = isset($_REQUEST["id_usuario"]) ? $_REQUEST["id_usuario"] : NULL;
$pontos_necessarios = null;
$pontos_usuario = null;

$listaServicos = listaServicos($conn, $id_servico);
if (!empty($listaServicos)) {
    foreach ($listaServicos as $servico) {
        $pontos_necessarios = $servico["servico_valor"];
    }
}

$listaUsuario = listarUsuarios($conn, $id_usuario);
if (!empty($listaUsuario)) {
    foreach ($listaUsuario as $usuario) {
        $pontos_usuario = $usuario["usuario_pontos"];
    }
}

$desbloquear_servico = desbloquearServico($conn, $id_usuario, $id_servico, $pontos_necessarios, $pontos_usuario);
echo $desbloquear_servico;
