<?php
session_start();
  $host = $_ENV["DB_HOST"];
  $username = $_ENV["DB_USERNAME"];
  $password = $_ENV["DB_PASSWORD"];
  $dbname = $_ENV["DB_NAME"];
  $port = $_ENV["DB_PORT"];

  // Conexão com MySQLi
  $conexao = @mysqli_connect($host, $username, $password, $dbname, $port);
?>
