<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Evento</title>
</head>
<body>
    <h2>Atualizar Evento</h2>

    <form action="atualizar_evento.php" method="POST">
        Código do Evento: <input type="number" name="id_evento" required><br>
        Novo Nome do Evento: <input type="text" name="nome_evento"><br>
        Nova Data do Evento: <input type="date" name="data_evento"><br>
        Nova Hora de Início: <input type="time" name="hora_inicio"><br>
        Nova Hora de Fim: <input type="time" name="hora_fim"><br>
        Nova Descrição: <textarea name="desc_evento"></textarea><br>
        Novo Local do Evento: <input type="text" name="local_evento"><br>
        Novo Responsável: <input type="text" name="resp_evento"><br>
        <input type="submit" name="submit" value="Atualizar">
    </form>

<?php
if (isset($_POST['submit'])) {
    require 'conexao.php';

    $id_evento = $_POST['id_evento'];
    $nome_evento = $_POST['nome_evento'];
    $data_evento = $_POST['data_evento'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];
    $desc_evento = $_POST['desc_evento'];
    $local_evento = $_POST['local_evento'];
    $resp_evento = $_POST['resp_evento'];

    $sql = "UPDATE eventos SET 
            Nome_Evento = COALESCE(NULLIF(:nome_evento, ''), Nome_Evento),
            Data_Evento = COALESCE(NULLIF(:data_evento, ''), Data_Evento),
                        Hora_Inicio = COALESCE(NULLIF(:hora_inicio, ''), Hora_Inicio),
            Hora_Fim = COALESCE(NULLIF(:hora_fim, ''), Hora_Fim),
            Desc_Evento = COALESCE(NULLIF(:desc_evento, ''), Desc_Evento),
            Local_Evento = COALESCE(NULLIF(:local_evento, ''), Local_Evento),
            Resp_Evento = COALESCE(NULLIF(:resp_evento, ''), Resp_Evento)
            WHERE Id_Evento = :id_evento";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome_evento' => $nome_evento,
        ':data_evento' => $data_evento,
        ':hora_inicio' => $hora_inicio,
        ':hora_fim' => $hora_fim,
        ':desc_evento' => $desc_evento,
        ':local_evento' => $local_evento,
        ':resp_evento' => $resp_evento,
        ':id_evento' => $id_evento
    ]);

    echo "Evento atualizado com sucesso!";
}
?>
</body>
</html>

