<!DOCTYPE html>
<html>
<head>
    <title>Remover Evento</title>
</head>
<body>
    <h2>Remover Evento</h2>
    
    <form action="remover_evento.php" method="POST">
        Código do Evento: <input type="number" name="id_evento" required><br><br>
        <input type="submit" name="submit" value="Remover Evento">
    </form>

<?php
if (isset($_POST['submit'])) {
    require 'conexao.php';  // Inclui o arquivo de conexão com o banco de dados

    $id_evento = $_POST['id_evento'];  // Captura o ID do evento fornecido pelo usuário

    // Verifica se o evento com o ID informado existe no banco de dados
    $sql_check = "SELECT * FROM eventos WHERE Id_Evento = :id_evento";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([':id_evento' => $id_evento]);
    $evento = $stmt_check->fetch();

    if ($evento) {
        // Se o evento existe, procede com a remoção
        $sql_delete = "DELETE FROM eventos WHERE Id_Evento = :id_evento";
        $stmt_delete = $pdo->prepare($sql_delete);
        $stmt_delete->execute([':id_evento' => $id_evento]);

        echo "<p>Evento ID " . $id_evento . " foi removido com sucesso!</p>";
    } else {
        echo "<p>Evento com ID " . $id_evento . " não foi encontrado.</p>";
    }
}
?>
</body>
</html>
