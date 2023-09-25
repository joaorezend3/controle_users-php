<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servidor = "localhost";
    $usuario = "joao";
    $senha_db = ""; // Renomeada para evitar sobreposição
    $dbname = "sistemausers";

    // Captura os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha_formulario = $_POST["senha"]; // Renomeada para evitar sobreposição
    $tell = $_POST["tell"];
    $cep = $_POST["cep"];

    // Criptografa a senha
    $senhaHash = password_hash($senha_formulario, PASSWORD_DEFAULT);

    // Cria a conexão com o banco de dados
    $conn = new mysqli($servidor, $usuario, $senha_db, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Prepara a consulta SQL para inserir o usuário
    $sql = "INSERT INTO usuarios (nome, email, senha, tell, cep) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nome, $email, $senhaHash, $tell, $cep);

    // Executa a consulta
    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário: " . $stmt->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
}

?>
