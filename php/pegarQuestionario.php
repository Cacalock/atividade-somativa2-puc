<?php
  header('Content-Type: text/html; charset=UTF-8');
  $servername = "localhost";
  $username = "root";
  $db_password = "";
  $dbname = "somativa2";

  $questionario_id = $_GET["id"];
  if(!$questionario_id){
    die("Não foi possivel receber o id");
  }

  $conn = new mysqli($servername, $username, $db_password, $dbname);
  if ($conn->connect_error) {
    die("Falha de conexão: " . $conn->connect_error);
  }

  $sql = "SELECT id, anoTurma, servidorPreferido, gostarPlugins, prefereMods, eventosCompeticoes, apoiaVip, feedback, sugestao
FROM questionario WHERE id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $questionario_id);
    $stmt->execute();
    $stmt->bind_result($id, $anoTurma, $servidorPreferido, $gostarPlugins, $prefereMods, $eventosCompeticoes, $apoiaVip, $feedback, $sugestao);
    $stmt->fetch();

  $dados = "
    <div>
      <div style='text-align: center;'>$id</div>
      <div>$anoTurma</div>
      <div>$servidorPreferido</div>
      <div>$gostarPlugins</div>
      <div>$eventosCompeticoes</div>
      <div>$apoiaVip</div>
      <div>$feedback</div>
      <div>$prefereMods</div>  
      <div>$sugestao</div>
    </div>
  "
  $stmt->close();
  echo $dados;
?>