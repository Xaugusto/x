<?php
include('../../conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Categoria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2; 
            display: flex;
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }
        main {
            background-color: #fff; 
            padding: 20px;
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            text-align: center; 
        }
        input[type="text"] {
            width: 80%; 
            padding: 10px;
            margin-top: 10px; 
            margin-bottom: 20px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
        }
        button {
            background-color: #7A288A; 
            color: #fff; 
            padding: 10px 15px;
            border: none;
            border-radius: 5px; 
            cursor: pointer; 
        }
        button:hover {
            background-color: #9B30FF; 
        }
        table {
            width: 100%; 
            margin-top: 20px;
            border-collapse: collapse; 
        }
        th, td {
            border: 1px solid #ccc; 
            padding: 10px; 
            text-align: left; 
        }
        th {
            background-color: #f9f9f9; 
        }
        /* Estilos para o link */
        a {
            display: block; /* Para ocupar uma linha inteira */
            margin-bottom: 20px; /* Espaçamento inferior */
            text-decoration: none; /* Remove o sublinhado */
            color: #7A288A; /* Cor do texto */
            font-weight: bold; /* Negrito */
            transition: color 0.3s; /* Transição suave para a cor */
        }
        a:hover {
            color: #9B30FF; /* Cor ao passar o mouse */
        }
    </style>
</head>
<body>
    <main>
        <a href="../consulta.php">Página de Consulta</a>
        <h1>Cadastrar Console</h1>
        <form action="inserir_con.php" method="post">
            <label>Nome:</label>
            <input type="text" name="nome" required>
            <button type="submit">Cadastrar</button>
        </form>

        <table>
            <tr><th>id</th><th>categoria</th><td>Excluir</td></tr>
            <?php
            $sql = "SELECT * FROM console";
            $executar = mysqli_query($conexao, $sql);
            if ($executar) {
                while ($res = mysqli_fetch_array($executar)) {
                    $id = $res['id_con'];
                    echo "<tr><td>".$res['id_con']."</td><td>".$res['nome_con']."</td><td><a href='del_con.php?id=$id'>Excluir</a></td></tr>";
                }
            } 
            mysqli_close($conexao); 
            ?>
        </table>
    </main>
</body>
</html>