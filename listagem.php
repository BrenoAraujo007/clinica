<?php
include 'conexao.php';

$consultas = $pdo->query("
    SELECT c.id, p.nome AS paciente, m.nome AS medico, c.data, c.hora 
    FROM consultas c 
    JOIN pacientes p ON c.paciente_id = p.id 
    JOIN medicos m ON c.medico_id = m.id
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consultas Agendadas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Consultas Agendadas</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Data</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($consultas as $consulta): ?>
            <tr>
                <td><?= $consulta['id'] ?></td>
                <td><?= $consulta['paciente'] ?></td>
                <td><?= $consulta['medico'] ?></td>
                <td><?= $consulta['data'] ?></td>
                <td><?= $consulta['hora'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
