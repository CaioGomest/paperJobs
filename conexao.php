<?php
$localhost = "127.0.0.1";
$usuario = "root";
$senha_db = "";
$nome_db = "paperjobs";
$porta_db = "3306";

$conn = new mysqli($localhost, $usuario, $senha_db, $nome_db);

// Verifique se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// $localhost = "127.0.0.1";
// $usuario = "u214219698_admin";
// $senha_db = "Cinteo162103@";
// $nome_db = "u214219698_qideia";
// $porta_db = "3306";