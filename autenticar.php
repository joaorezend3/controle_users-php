<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servidor = "localhost";
    $usuario = "joao";
    $senha_db = "";
    $dbname = "sistemausers";

    $email = $_POST["email"];
    $senha_formulario = $_POST["senha"];

    $conn = new mysqli($servidor, $usuario, $senha_db, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "SELECT id, senha FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $senhaHash);
        $stmt->fetch();

        if (password_verify($senha_formulario, $senhaHash)) {
            // Senha correta, autenticação bem-sucedida
            $_SESSION['user_id'] = $id;
            header("Location: pagina_inicial.php"); // Redireciona para a página restrita
        } else {
            echo "Senha incorreta. Tente novamente.";
        }
    } else {
        echo "Email não encontrado. Registre-se primeiro.";
    }

    $conn->close();
}
?>
