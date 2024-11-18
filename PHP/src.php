
<?php

global $servername;
global $username;
global $password;
global $dbname; 

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "users";

$nick    = $_POST["nick"];
$email   = $_POST["email"];
$password    = $_POST["password"];


$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);



?>