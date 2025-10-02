<?php
include('../conexao.php');
$id = $_GET['id'];
$con = $conexao;
$sql = "SELECT * FROM clientes WHERE id_cli=$id";
$executar = mysqli_query($con, $sql);
$res = mysqli_fetch_array($executar);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f9f9f9;
    }

    .container {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
        max-width: 600px;
        margin: auto; /* Centraliza o container */
    }

    h1 {
        text-align: center;
        color: #7A288A;
    }

    label {
        font-weight: bold;
        display: block;
        margin-top: 10px;
    }
    
    /* Estilo para a tag 'label' baseada no nome do input anterior */
    form br + input[type="text"],
    form br + select {
        /* Garante que os inputs após o <br> tenham o estilo */
        margin-bottom: 15px;
        margin-top: 5px; /* Adiciona um pequeno espaçamento */
    }

    input[type="text"], select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box; /* Inclui padding e border no width total */
    }

    /* Ajuste para o formulário no upd_cli.php que usa texto solto em vez de <label> */
    form > input[type="text"]:not([readonly]),
    form > select {
        display: block;
        margin-bottom: 15px;
        margin-top: 5px;
    }
    
    /* Estilo específico para os textos que funcionam como labels */
    form > br {
        display: none; /* Esconde os <br> */
    }
    
    /* Estilo para os textos que agem como "labels" antes dos inputs */
    form {
        line-height: 2; /* Para o espaçamento entre as linhas de texto/input */
    }
    
    form > input[type="text"]:first-of-type {
        /* O primeiro input (ID) é readonly e não precisa do margin-top */
        margin-top: 0;
    }
    
    /* Estilo para o texto 'Id cliente', 'Nome do Cliente', etc. */
    /* Como não são <label>s, o CSS será menos direto, mas ajustamos o layout geral */


    input[type="submit"] {
        background-color: #7A288A;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 15px;
    }

    input[type="submit"]:hover {
        background-color: #9B30FF;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Atualizar Cliente</h1>
        <form action="atualizar_cli.php" method="post">
            Id cliente <input type="text" name="id"
            value="<?php echo $res['id_cli'];?>" readonly><br>
            
            Nome do Cliente <input name="nome" type="text"
            value="<?php echo $res['nome_cli'];?>"><br>
            
            Email do cliente <input type="text" name="email"
            value="<?php echo $res['email'];?>"><br>
            
            Senha <input type="text" name="senha" 
            value="<?php echo $res['senha'];?>"><br>
            
            Tipo de Usuario <select name="user" value="<?php echo $res['user_type'];?>">
            <?php
                $sql = "select * from usuario order by tipo asc";
                $exe = mysqli_query($con, $sql);
                while($res_user = mysqli_fetch_array($exe)){
                    $id_user = $res_user['id_user'];
                    $nome_user = $res_user['tipo'];
                    
                    // Lógica para pré-selecionar o tipo de usuário correto
                    $selected = ($id_user == $res['user_type']) ? "selected" : "";
                    
                    echo "<option value='$id_user' $selected>$nome_user</option>";
                }
                $fechar = mysqli_close($con);
                ?>
            </select><br>
            <input type="submit" value="Atualizar Cliente">
        </form>
    </div>
</body>
</html>
