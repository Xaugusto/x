<?php
session_start();
$nome = $_SESSION['nome'];
$id = $_SESSION['idcli'];
$user = $_SESSION['user'];
if($user == 1){
	die("Usuário não tem acesso a esse recurso!
	<a href='http://localhost/augusto/tcc/site%20web/arquivos%20certos/'>Voltar</a>");
}
elseif($nome == null){
	die("Usuário não autenticado!");
	header('location:cadastro_login.php');
}
?>