<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $servername = "localhost";
  $username = "root";
  $db_password = "";
  $dbname = "somativa2";
  
  $usuario_id = $_COOKIE["user_id"];
  
  $conn = new mysqli($servername, $username, $db_password, $dbname);
  if ($conn->connect_error) {
    die("Falha de conexão: " . $conn->connect_error);
  }

  $sqlSelect = "SELECT id, nick, email, senha FROM usuarios WHERE id = ?;";
  $stmt = $conn->prepare($sqlSelect);
  $stmt->bind_param("i", $usuario_id);
  $stmt->execute();
  $stmt->bind_result($old_id, $old_nick, $old_email, $old_senha);
  $stmt->fetch();
  $stmt->close();

  $nick_POST = $_POST["nick"] ?? $old_nick;
  $email_POST = $_POST["email"] ?? $old_email;
  $senha_POST = $_POST['password'] ?? $old_senha; 
  $senha_POST = password_hash(trim($senha_POST), PASSWORD_BCRYPT);
  echo "nick: $nick_POST - email: $email_POST - senha: $senha_POST";
  
  $sql = "UPDATE usuarios SET nick = ?, email = ?, senha = ? WHERE id = ?;";
  $stmt = $conn->prepare($sql);
  
  if ($stmt) {
    $stmt->bind_param("sssi", $nick_POST, $email_POST, $senha_POST, $usuario_id);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
      header("Location: ../opcoes.html?user_id=" . $usuario_id);
      exit();
    } else {  
      echo "Não foi possivel deletar corretamente o registro.";
    }
    
    $stmt->close();
  } else {
    echo "Erro na preparação: " . $conn->error;
  }
  $conn->close();

}
?>
