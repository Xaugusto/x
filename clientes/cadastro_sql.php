<?php
    include('../conexao.php');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $user = $_POST['user'];
    $sql = "insert into clientes (nome, email, senha, user_type)
    values ('$nome', '$email', '$senha', '$user')";
    echo $sql;
    $exe = mysqli_query($conexao, $sql);
    if($exe == 1){
        echo"Sucesso!";
    }
    else{
        echo"Deu pobrema ai";
    }
    $fechar = mysqli_close($conexao);
?>