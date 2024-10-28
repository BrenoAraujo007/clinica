<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paciente_id = $_POST['paciente_id'];
    $medico_id = $_POST['medico_id'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];

    $consulta = $pdo->prepare("INSERT INTO consultas (paciente_id, medico_id, data, hora) VALUES (?, ?, ?, ?)");
    $consulta->execute([$paciente_id, $medico_id, $data, $hora]);

    echo "<div class='alert alert-success'>Consulta agendada com sucesso!</div>";
}


$pacientes = $pdo->query("SELECT * FROM pacientes")->fetchAll();
$medicos = $pdo->query("SELECT * FROM medicos")->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agendar Consulta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Agendar Consulta</h1>
    <form method="POST" class="form-group">
        <label>Paciente:</label>
        <select name="paciente_id" class="form-control" required>
            <?php foreach ($pacientes as $paciente): ?>
                <option value="<?= $paciente['id'] ?>"><?= $paciente['nome'] ?></option>
            <?php endforeach; ?>
        </select><br>
        
        <label>Médico:</label>
        <select name="medico_id" class="form-control" required>
            <?php foreach ($medicos as $medico): ?>
                <option value="<?= $medico['id'] ?>"><?= $medico['nome'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label>Data:</label>
        <input type="date" name="data" class="form-control" required><br>
        
        <label>Hora:</label>
        <input type="time" name="hora" class="form-control" required><br>
        
        <input type="submit" value="Agendar" class="btn btn-primary">
    </form>
</body>
</html>
