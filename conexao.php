<?php
  $host = $_ENV[ 'MYSQLHOST'];
Şusername = $_ENV[ 'MYSQLUSER'];
$password = $_ENV['MYSQLPASSWORD'];
$dbname = $_ENV[ 'MYSQLDATABASE'];
$port = $_ENV['MYSQLPORT'];
$conexao = mysqli_connect($host, $username, $password, $dbname, $port);
?>