<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "somativa2";

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    if ($conn->connect_error) {
        die("Falha de conexão: " . $conn->connect_error);
    }

    $createTableQuery = "CREATE TABLE IF NOT EXISTS questionario (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        anoTurma VARCHAR(255),
        servidorPreferido VARCHAR(255),
        gostarPlugins VARCHAR(255),
        prefereMods VARCHAR(255),
        eventosCompeticoes VARCHAR(255),
        apoiaVip VARCHAR(255),
        feedback TEXT,
        sugestao TEXT
    )";

    if ($conn->query($createTableQuery) !== TRUE) {
        die("Erro ao criar tabela: " . $conn->error);
    }

    $user_id = intval($_POST["user_id"]);
    $anoTurma = htmlspecialchars($_POST["anoTurma"] ?? '');
    $servidorPreferido = htmlspecialchars($_POST["pergunta2"] ?? '');
    $gostarPlugins = htmlspecialchars($_POST["pergunta3"] ?? '');
    $prefereMods = htmlspecialchars($_POST["pergunta4"] ?? '');
    $eventosCompeticoes = htmlspecialchars($_POST["pergunta5"] ?? '');
    $apoiaVip = htmlspecialchars($_POST["pergunta6"] ?? '');
    $feedback = htmlspecialchars($_POST["feedback"] ?? '');
    $sugestao = htmlspecialchars($_POST["sugestao"] ?? '');

    $sql = "INSERT INTO questionario (user_id, anoTurma, servidorPreferido, gostarPlugins, prefereMods, eventosCompeticoes, apoiaVip, feedback, sugestao) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("issssssss", $user_id, $anoTurma, $servidorPreferido, $gostarPlugins, $prefereMods, $eventosCompeticoes, $apoiaVip, $feedback, $sugestao);
        
        if ($stmt->execute()) {
            header("Location: ../agradecimento.html");
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