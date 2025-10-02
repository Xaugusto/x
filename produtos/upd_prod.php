<?php
include('../conexao.php');
$id = $_GET['id'];
$con = $conexao;
$sql = "SELECT * FROM produtos WHERE id_prod=$id";
$executar = mysqli_query($con, $sql);
$res = mysqli_fetch_array($executar);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #7A288A;
        color: #fff;
    }

    tr:hover {
        background-color: #f0f0f0;
    }

    a {
        text-decoration: none;
        color: #7A288A;
    }

    a:hover {
        color: #9B30FF;
    }
    .link-principal {
        font-weight: bold;
        font-size: 18px;
        color: #7A288A;
        transition: color 0.3s;
    }

    .link-principal:hover {
        color: #9B30FF;
    }
    .link-container {
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }

    .link-container a {
        margin: 0 20px;
        font-weight: bold;
        font-size: 18px;
        color: #7A288A;
        transition: color 0.3s;
    }

    .link-container a:hover {
        color: #9B30FF;
    }

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
        margin: auto;
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

    input[type="text"], input[type="file"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #7A288A;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #9B30FF;
    }
</style>

    <title>Atualizar Produto</title>
</head>
<body>
    <div class="container">
        <h1>Atualizar Produto</h1>
        <form action="atualizar.php" method="post" enctype="multipart/form-data">
            <label for="id">Id produto:</label>
            <input type="text" name="id" id="id" value="<?php echo $res['id_prod'];?>" readonly><br>

            <label for="arquivo">Foto do Produto:</label>
            <input name="arquivo" type="file"><br>

            <label for="nome">Nome do produto:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $res['nome_prod'];?>"><br>

            <label for="quant">Quantidade:</label>
            <input type="text" name="quant" id="quant" value="<?php echo $res['quant'];?>"><br>

            <label for="des">Descrição do Produto:</label>
            <input type="text" name="des" id="des" value="<?php echo $res['descricao']; ?>"><br>

            <label for="preco">Valor:</label>
            <input type="text" name="preco" id="preco" value="<?php echo $res['preco'];?>"><br>

            <label for="cat">Categoria:</label>
            <select name="cat" id="cat">
                <?php
                $cat = $res['categoria'];
                $sql = "SELECT * FROM categoria";
                $exe = mysqli_query($con, $sql);
                while ($res_cat = mysqli_fetch_array($exe)) {
                    $id_cat = $res_cat['id_cat'];
                    if($cat == $id_cat){
                        $selected = "selected";
                    }
                    else{
                        $selected = "";
                    }
                    $nome_cat = $res_cat['nome_cat'];
                    echo "<option value='$id_cat' $selected>$nome_cat</option>";
                }
                ?>
            </select><br>

            <label for="con">Console:</label>
            <select name="con" id="con">
                <?php
                $console = $res['console'];
                $sql_2 = "SELECT * FROM console";
                $exe_2 = mysqli_query($con, $sql_2);
                while ($res_con = mysqli_fetch_array($exe_2)) {
                    $id_con = $res_con['id_con'];
                    if($console == $id_con){
                        $selected = "selected";
                    }
                    else{
                        $selected = "";
                    }
                    $nome_con = $res_con['nome_con'];
                    echo "<option value='$id_con' $selected>$nome_con</option>";
                }
                mysqli_close($con);
                ?>
            </select><br>

            <input type="submit" value="Atualizar Produto">
        </form>
    </div>
</body>
</html>
