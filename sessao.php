<?php
session_start();
$nome = $_SESSION['nome'];
$id = $_SESSION['idcli'];
$user = $_SESSION['user'];
if($nome == null){
	header('location:cadastro_login.php');
}
?>