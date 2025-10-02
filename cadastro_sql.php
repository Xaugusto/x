<?php
    include('conexao.php');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $user = $_POST['user'];
    $sql = "insert into clientes (nome_cli, email, senha, user_type)
    values ('$nome', '$email', '$senha', '$user')";
    
    $exe = mysqli_query($conexao, $sql);
    if($exe == 1){
        $cad = 1;
    
       header("Location: pagina_principal.php?$cad=".urlencode($valor));
    }
    else{
        echo"Deu pobrema ai";
    }
    $fechar = mysqli_close($conexao);
?>