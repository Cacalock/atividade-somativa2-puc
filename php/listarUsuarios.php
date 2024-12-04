<?php
  header('Content-Type: text/html; charset=UTF-8');
  $servername = "localhost";
  $username = "root";
  $db_password = "";
  $dbname = "somativa2";

  $conn = new mysqli($servername, $username, $db_password, $dbname);
  if ($conn->connect_error) {
    die("Falha de conexão: " . $conn->connect_error);
  }

  $sql = "SELECT id, nick FROM usuarios;";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->bind_result($id, $nick);
  $dados = "";
  while ($stmt->fetch()) {
    $dados .= "<tr>
        <td style='text-align: center;' ><a class='registro' href='./pegarUsuario.html?id=$id' >$id</a></td>
        <td><a class='registro' href='./pegarUsuario.html?id=$id' >$nick</a></td>
      </a>
    </tr>";
  }
  $stmt->close();
  echo $dados;
?>