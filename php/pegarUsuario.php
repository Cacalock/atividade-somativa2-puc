<?php
  header('Content-Type: text/html; charset=UTF-8');
  $servername = "localhost";
  $username = "root";
  $db_password = "";
  $dbname = "somativa2";

  $usuario_id = $_GET["id"];
  if(!$usuario_id){
    die("Não foi possivel receber o id");
  }

  $conn = new mysqli($servername, $username, $db_password, $dbname);
  if ($conn->connect_error) {
    die("Falha de conexão: " . $conn->connect_error);
  }

  $sql = "SELECT id, nick, email, senha FROM usuarios WHERE id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $stmt->bind_result($id, $nick, $email, $senha);
    $stmt->fetch();

  $dados = "
    <div>
      <a href='./aaaaa.html' >
        <div style='text-align: center;'>$id</div>
        <div>$nick</div>
      </a>
    </div>
  "
  $stmt->close();
  echo $dados;
?>