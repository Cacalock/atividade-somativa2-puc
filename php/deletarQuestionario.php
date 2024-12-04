<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $questionario_id = $_GET["excluirQuest"] ?? null;
    echo "questionario_id $questionario_id";

    if (!$questionario_id) {
        die("Não foi possível receber o ID.");
    }

    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "somativa2";

    $conn = new mysqli($servername, $username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Falha de conexão: " . $conn->connect_error);
    }

    $sql = "DELETE FROM questionario WHERE id = ?;";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $questionario_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header("Location: ../responquest.html");
            exit();
        }
        echo "Id não localizado";
    };
}
?>