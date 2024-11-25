<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "somativa2";
    
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = new mysqli($servername, $username, $db_password, $dbname);
    
    if ($conn->connect_error) {
        die("Falha de conexão: " . $conn->connect_error);
    }

    $sql = "SELECT id, senha FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        if ( $user_id && $password == $hashed_password) {
            header("Location: ../questionario.html?user_id=" . $user_id);
            exit();
        } else {
            echo "Email ou senha incorretos.";
        }
        
        $stmt->close();
    } else {
        echo "Erro na preparação: " . $conn->error;
    }

    $conn->close();
}
?>