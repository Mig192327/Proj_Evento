<?php
$host = 'localhost';  // Host do banco de dados
$db = 'eventos';      // Nome do banco de dados (ajustado para "eventos")
$user = 'root';       // Usuário do MySQL
$pass = '';           // Senha do MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro na conexão: ' . $e->getMessage();
}
?>
