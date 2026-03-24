<?php
  $host = getenv('MYSQLHOST');
  $user = getenv('MYSQLUSER');
  $pass = getenv('MYSQLPASSWORD');
  $db   = getenv('MYSQLDATABASE');
  $port = getenv('MYSQLPORT');
  
  // Conexão com MySQLi
  $conexao = @mysqli_connect($host, $user, $pass, $db, $port);
?>
