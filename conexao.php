<?php
$host = 'localhost';
$db = 'clinica';
$user = 'root'; 
$senha = 'breno'; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>
