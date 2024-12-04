<?php
  $servername = "localhost";
  $username = "root";
  $db_password = "";
  $dbname = "somativa2";
  $usuario_id = $_COOKIE["user_id"];
  echo "usuario_id: $usuario_id";

  $conn = new mysqli($servername, $username, $db_password, $dbname);
  if ($conn->connect_error) {
    die("Falha de conexão: " . $conn->connect_error);
  }

  $sql = "DELETE FROM usuarios WHERE id = ?;";
  $stmt = $conn->prepare($sql);
      
  if ($stmt) {
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    
    header("Location: ../index.html");
    exit();
    
    $stmt->close();
  } else {
      echo "Erro na preparação: " . $conn->error;
  }
  $conn->close();

?>
