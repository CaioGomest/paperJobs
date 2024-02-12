<?php
session_start();
require('../conexao.php');
require('../functions/functions_usuarios.php');
require('../functions/functions_servicos.php');

// Recebe os dados do formulário
$id_usuario = isset($_REQUEST['id_usuario']) ? $_REQUEST['id_usuario'] : null;
$nome = isset($_REQUEST['nome']) ? $_REQUEST['nome'] : null;
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
$numero = isset($_REQUEST['numero']) ? $_REQUEST['numero'] : null;
$senha = isset($_REQUEST['senha']) ? $_REQUEST['senha'] : null;

// Atualiza o usuário
$resultado_atualizacao = atualizarUsuario($conn, $id_usuario, $nome, $email, $numero, $senha);

if ($resultado_atualizacao == true) {
    // Constrói a mensagem de email
    $assunto = "PAPERJOBS - Atualização de Informações";
    $mensagem = "Olá,\n\nSuas informações foram atualizadas com sucesso:\n\n";
    $mensagem .= "Nome: " . ($nome ? $nome : "Não especificado") . "\n";
    $mensagem .= "Email: " . ($email ? $email : "Não especificado") . "\n";
    $mensagem .= "Número: " . ($numero ? $numero : "Não especificado") . "\n";
    $mensagem .= "Se você não realizou esta atualização, entre em contato conosco imediatamente.";

    // Define o destinatário do e-mail
    $destinatario = $_SESSION['usuario']["usuario_email"];

    $cabecalho = "From: suporte@stackcode.com.br\r\n";
    $cabecalho .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Tenta enviar o e-mail
    if (mail($destinatario, $assunto, $mensagem, $cabecalho, "-f suporte@stackcode.com.br")) {
        echo "E-mail enviado com sucesso.";
    } else {
        echo "Erro ao enviar o e-mail.";
    }
} else {
    echo "Erro ao atualizar usuário: " . $resultado_atualizacao;
}
