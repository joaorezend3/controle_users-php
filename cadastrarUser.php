<?php
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form action="cadastrar_usuario.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br>

        <label for="tell">Telefone:</label>
        <input type="text" id="tell" name="tell" required><br>

        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
