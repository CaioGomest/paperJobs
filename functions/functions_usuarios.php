<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

function deslogar()
{
    session_destroy();
    header("Location: index.php");

}
function loginUsuario($conn, $email, $senha)
{
    $query = "SELECT * FROM usuarios WHERE usuario_email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows >= 1) {
            $row = $result->fetch_assoc();
            $senha_hash = $row['usuario_senha'];
            if (password_verify($senha, $senha_hash)) {
                $_SESSION["usuario"] =
                    [

                        'usuario_id' => $row['usuario_id'],
                        'usuario_nome' => $row['usuario_nome'],
                        'usuario_email' => $row['usuario_email'],
                        'usuario_pontos' => $row['usuario_pontos'],
                        'usuario_numero' => $row['usuario_numero']
                    ];
                return true; // Senha correta, retorna verdadeiro
            } else {
                return false; // Senha incorreta
            }
        } else {
            return false; // Nenhum usuário encontrado com o email fornecido
        }

    }
}
function criarUsuario($conn, $nome = null, $email = null, $senha = null, $numero = null)
{
    $query = "SELECT COUNT(*) as total FROM usuarios WHERE usuario_email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count = $row['total'];

        if ($count > 0) {
            $stmt->close();
            echo "O email já existe no banco de dados.";
            return false; // Email já existe, não é possível criar o usuário
        }

        $stmt->close();

        // Se o email não existir, prossiga com a criação do usuário
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuarios (usuario_nome, usuario_email, usuario_senha, usuario_numero) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $nome, $email, $senhaHash, $numero);

        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            return true; // Sucesso ao criar o usuário
        } else {
            $error_message = $conn->error;
            $stmt->close();
            $conn->close();
            echo "Erro na inserção: " . $error_message; // Retornar mensagem de erro
            return false; // Falha na criação do usuário
        }
    } else {
        $stmt->close();
        echo "Erro na consulta: " . $conn->error;
        return false; // Falha na consulta
    }
}
function listarUsuarios($conn, $id = null)
{
    // Consulta SQL para listar todos os usuários
    $query = "SELECT * FROM usuarios WHERE 1=1";

    if (!empty($id))
        $query .= " AND usuario_id = " . mysqli_real_escape_string($conn, $id);


    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $usuarios = [];
        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }
        return $usuarios; // Retorna um array de objetos com os dados dos usuários
    } else {
        return []; // Retorna um array vazio se não houver usuários
    }
}
function atualizarUsuario($conn, $id = NULL, $nome = NULL, $email = NULL, $numero = NULL, $pontos = NULL)
{
    if ($id === NULL || (empty($nome) && empty($email) && empty($numero) && empty($pontos))) {
        return false; // Return false if no ID or fields to update are provided
    }
    // Prepare the base query
    $query = "UPDATE usuarios SET";

    $updates = [];
    $types = "";
    $bindParams = array();

    if (!empty($nome)) {
        $updates[] = " usuario_nome=?";
        $types .= "s";
        $bindParams[] = &$nome;
    }

    if (!empty($email)) {
        $updates[] = " usuario_email=?";
        $types .= "s";
        $bindParams[] = &$email;
    }

    if (!empty($numero)) {
        $updates[] = " usuario_numero=?";
        $types .= "s";
        $bindParams[] = &$numero;
    }
    if (!empty($pontos)) {
        $updates[] = " usuario_pontos=?";
        $types .= "i"; // Corrigindo para 'i' (inteiro) para pontos
        $bindParams[] = &$pontos;
    }


    $query .= " " . implode(",", $updates);
    $query .= " WHERE usuario_id = ?";
    $types .= "i";
    $bindParams[] = &$id;


    // Combine types string with bindParams array
    $bindParams = array_merge(array($types), $bindParams);

    // Prepare and bind parameters
    $stmt = mysqli_prepare($conn, $query);
    if ($stmt === false) {
        return "ERRO: " . mysqli_error($conn);
    }

    mysqli_stmt_bind_param($stmt, ...$bindParams);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        return "true";
    } else {
        return "ERRO: " . mysqli_stmt_error($stmt);
    }
}
function apagarUsuario($conn, $id)
{
    $query = "DELETE FROM Usuarios WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return true; // Sucesso ao apagar o usuário
    } else {
        $stmt->close();
        $conn->close();
        return false; // Falha ao apagar o usuário
    }
}
?>