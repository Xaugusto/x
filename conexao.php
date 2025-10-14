<?php
  $host = getenv["MYSQLHOST"];
  $username = getenv["MYSQLUSER"];
  $password = getenv["MYSQLPASSWORD"];
  $dbname = getenv[ "MYSQLDATABASE"];
  $port = getenv["MYSQLPORT"];
  $conexao = mysqli_connect($host, $username, $password, $dbname, $port);
?>
