<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servidor = "localhost";
    $usuario = "joao";
    $senha_db = ""; 
    $dbname = "sistemausers";

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha_formulario = $_POST["senha"]; 
    $tell = $_POST["tell"];
    $cep = $_POST["cep"];

    $senhaHash = password_hash($senha_formulario, PASSWORD_DEFAULT);

    $conn = new mysqli($servidor, $usuario, $senha_db, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "INSERT INTO usuarios (nome, email, senha, tell, cep) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nome, $email, $senhaHash, $tell, $cep);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário: " . $stmt->error;
    }

    $conn->close();
}
