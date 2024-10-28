<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];

    $consulta = $pdo->prepare("INSERT INTO pacientes (nome, data_nascimento, cpf, telefone, endereco, email) VALUES (?, ?, ?, ?, ?, ?)");
    $consulta->execute([$nome, $data_nascimento, $cpf, $telefone, $endereco, $email]);

    echo "<div class='alert alert-success'>Paciente cadastrado com sucesso!</div>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Paciente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Cadastro de Paciente</h1>
    <form method="POST" class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control" required><br>
        
        <label>Data de Nascimento:</label>
        <input type="date" name="data_nascimento" class="form-control" required><br>
        
        <label>CPF:</label>
        <input type="text" name="cpf" class="form-control" required><br>
        
        <label>Telefone:</label>
        <input type="text" name="telefone" class="form-control"><br>
        
        <label>Endereço:</label>
        <input type="text" name="endereco" class="form-control"><br>
        
        <label>E-mail:</label>
        <input type="email" name="email" class="form-control"><br>
        
        <input type="submit" value="Cadastrar" class="btn btn-primary">
    </form>
</body>
</html>
