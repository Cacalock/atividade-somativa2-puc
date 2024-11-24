<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $servername = "localhost:3306";
     $username = "root";
     $password = "";
     $dbname = "users";

     $nick = $_POST["nick"];
     $email = $_POST["email"];
     $password = $_POST["password"];

     $conn = new mysqli($servername, $username, $password, $dbname);

     if ($conn->connect_error) {
         die("Falha de conexão: " . $conn->connect_error);
     }

     $sql = "INSERT INTO users (nick, email, password) VALUES (?, ?, ?)";

     $stmt = $conn->prepare($sql);
     if ($stmt) {
         $stmt->bind_param("sss", $nick, $email, $password);

         if ($stmt->execute()) {
             echo "Novo registro criado com sucesso";
         } else {
             echo "Erro: " . $sql . "<br>" . $stmt->error;
         }

         $stmt->close();
     } else {
         echo "Erro na preparação: " . $conn->error;
     }

     $conn->close();
 }
 ?>