<!DOCTYPE html>
<html>
<head>
    <title>Consultar Evento</title>
</head>
<body>
    <h2>Consultar Evento</h2>
    <form action="consultar_evento.php" method="GET">
        Código do Evento: <input type="number" name="id_evento" required><br>
        <input type="submit" value="Consultar">
    </form>

<?php
if (isset($_GET['id_evento'])) {
    require 'conexao.php';

    $id_evento = $_GET['id_evento'];

    $sql = "SELECT * FROM eventos WHERE Id_Evento = :id_evento";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id_evento' => $id_evento]);
    $evento = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($evento) {
        echo "<h3>Detalhes do Evento</h3>";
        echo "Nome: " . $evento['Nome_Evento'] . "<br>";
        echo "Data: " . $evento['Data_Evento'] . "<br>";
        echo "Hora de Início: " . $evento['Hora_Inicio'] . "<br>";
        echo "Hora de Fim: " . $evento['Hora_Fim'] . "<br>";
        echo "Descrição: " . $evento['Desc_Evento'] . "<br>";
        echo "Local: " . $evento['Local_Evento'] . "<br>";
        echo "Responsável: " . $evento['Resp_Evento'] . "<br>";
    } else {
        echo "Evento não encontrado!";
    }
}
?>
</body>
</html>
