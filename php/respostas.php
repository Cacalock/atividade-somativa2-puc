<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "somativa2";
    
    $conn = new mysqli($servername, $username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Falha de conexão: " . $conn->connect_error);
    }

    $createTableSQL = "CREATE TABLE IF NOT EXISTS questionario (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user_id INT(11) NOT NULL,
        anoTurma VARCHAR(50),
        servidorPreferido VARCHAR(50),
        gostarPlugins VARCHAR(50),
        prefereMods VARCHAR(50),
        eventosCompeticoes VARCHAR(50),
        apoiaVip VARCHAR(50),
        feedback TEXT,
        sugestao TEXT
    )";

    if ($conn->query($createTableSQL) !== TRUE) {
        die("Erro ao criar tabela: " . $conn->error);
    }

    $user_id = intval($_POST["user_id"]);
    $anoTurma = $_POST["anoTurma"] ?? '';
    $servidorPreferido = $_POST["pergunta2"] ?? '';
    $gostarPlugins = $_POST["pergunta3"] ?? '';
    $prefereMods = $_POST["pergunta4"] ?? '';
    $eventosCompeticoes = $_POST["pergunta5"] ?? '';
    $apoiaVip = $_POST["pergunta6"] ?? '';
    $feedback = $_POST["feedback"] ?? '';
    $sugestao = $_POST["sugestao"] ?? '';

    $sql = "INSERT INTO questionario (user_id, anoTurma, servidorPreferido, gostarPlugins, prefereMods, eventosCompeticoes, apoiaVip, feedback, sugestao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("issssssss", $user_id, $anoTurma, $servidorPreferido, $gostarPlugins, $prefereMods, $eventosCompeticoes, $apoiaVip, $feedback, $sugestao);
        
        if ($stmt->execute()) {
            header("Location: ../opcoes.html");
            exit();
        } else {
            echo "Erro ao enviar respostas: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro na preparação: " . $conn->error;
    }
    $conn->close();
}
?>