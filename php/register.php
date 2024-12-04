<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "somativa2";
    
    $nick = $_POST["nick"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    
    $conn = new mysqli($servername, $username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Falha de conexão: " . $conn->connect_error);
    }

    $createTableSQL = "CREATE TABLE IF NOT EXISTS usuarios (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        nick VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        senha VARCHAR(255) NOT NULL
    )";

    if ($conn->query($createTableSQL) !== TRUE) {
        die("Erro ao criar tabela: " . $conn->error);
    };
    
    $sql = "INSERT INTO usuarios (nick, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("sss", $nick, $email, $password);
        if ($stmt->execute()) {
            echo "Novo registro criado com sucesso";
            header("Location: ../login.html");
            exit();
        } else {
            echo "Erro ao criar registro: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Erro na preparação: " . $conn->error;
    }
    
    $conn->close();
}
?>