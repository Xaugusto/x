<?php
include('sessao.php');
$carrinho = isset($_GET['carrinho']) ? $_GET['carrinho'] : 0; // Atribui 0 se não houver valor
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho - Minha Loja Online</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #f4f4f4, #eaeaea);
            margin: 0;
            padding: 20px;
        }
        header {
            background: #6947ff;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        nav {
            margin: 20px 0;
        }
        nav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s, transform 0.3s;
        }
        nav a:hover {
            color: #ffe135;
            transform: scale(1.1);
        }
        h1 {
            color: #fff;
            font-size: 2.5em;
        }
        .carrinho {
            margin-top: 40px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .carrinho-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }
        .carrinho-item img {
            width: 100px;
            height: auto;
            margin-right: 15px;
        }
        .carrinho-item button {
            background: #ff6347;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            transition: background 0.3s;
            border-radius: 5px;
        }
        .carrinho-item button:hover {
            background: #ffe135;
            color: #333;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            padding: 20px 0;
            background: #333;
            color: #fff;
        }
        /* Estilos para o modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .modal-content {
            background-color: rgba(0, 255, 0, 0.8);
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            text-align: center;
            border-radius: 10px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script>
        // Função para exibir o modal
        function mostrarModal(mensagem) {
            document.getElementById('modalMensagem').innerText = mensagem;
            document.getElementById('myModal').style.display = 'block';
            setTimeout(fecharModal, 5000); // Fecha o modal após 5 segundos
        }

        // Função para fechar o modal
        function fecharModal() {
            document.getElementById('myModal').style.display = 'none';
        }

        // Executa a função se o carrinho for igual a 1 ou 2
        window.onload = function() {
            <?php if ($carrinho == 1): ?>
                mostrarModal("Item adicionado ao carrinho!");
            <?php elseif ($carrinho == 2): ?>
                mostrarModal("Item removido do carrinho!");
            <?php endif; ?>
        };
    </script>
</head>
<body>
    <header>
        <h1>Seu Carrinho</h1>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="cadastro_login.php">Cadastro</a>
            <a href="contato.html">Contato</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <div class="carrinho">
        <h2>Itens no Carrinho</h2>
        <div id="cartItems">
            <?php
            include('conexao.php');
            $id_cli = $_SESSION['idcli'];
            $con = $conexao;
            if (!$con) {
                die("Conexão falhou: " . mysqli_connect_error());
            }
            $sql = "SELECT * FROM carrinho, produtos WHERE carrinho.id_cli = $id_cli AND carrinho.id_prod=produtos.id_prod";
            $exe = mysqli_query($con, $sql);
            $total = 0;
            while($res = mysqli_fetch_array($exe)){
                $id_car = $res['id_car'];
                $nome = $res['nome_prod'];
                $valor = $res['preco'];
                $foto = $res['foto_prod'];
                $total += $valor;
                echo "<div class='carrinho-item'>
                        <img src='produtos/imagens/$foto' alt='$nome'>
                        <span>$nome</span>
                        <span>R$ $valor</span>
                        <a href='del_carrinho.php?id=$id_car'><button>Remover</button></a>
                      </div>";
            }
            echo "<div>Total: <strong>R$ $total</strong></div>";
            mysqli_close($con);
            ?>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModal()">&times;</span>
            <h2 id="modalMensagem">Mensagem</h2>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Minha Loja Online. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
