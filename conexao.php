<?php
  $host = $_ENV["DB_HOST"];
  Şusername = $_ENV["DB_USER"];
  $password = $_ENV["DB_PASSWORD"];
  $dbname = $_ENV[ "DB_DATABASE"];
  $port = $_ENV["DB_PORT"];
  $conexao = mysqli_connect($host, $username, $password, $dbname, $port);
?>