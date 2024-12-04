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

  $sql = "SELECT id, anoTurma, servidorPreferido, gostarPlugins, prefereMods, eventosCompeticoes, apoiaVip, feedback, sugestao
FROM questionario;";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->bind_result($id, $anoTurma, $servidorPreferido, $gostarPlugins, $prefereMods, $eventosCompeticoes, $apoiaVip, $feedback, $sugestao
);
  $dados = "";
  while ($stmt->fetch()) {
    $dados .= "
    <tr>
      <td style='text-align: center;' >$id</td>
      <td>$anoTurma</td>
      <td>$servidorPreferido</td>
      <td>$gostarPlugins</td>
      <td>$eventosCompeticoes</td>
      <td>$apoiaVip</td>
      <td>$feedback</td>
    </tr>";
  }
  $stmt->close();
  echo $dados;
?>