 <?php
include('sessao.php');
$login = isset($_GET['login']) ? $_GET['login'] : 0;?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/pag_principal.css">
  <title>Minha Loja Online</title>
  <style>
    /* Estilos para o modal */
    .modal {
      display: none; /* Escondido por padrão */
      position: fixed; /* Fixo na tela */
      z-index: 1; /* Fica acima de outros elementos */
      left: 0;
      top: 0;
      width: 100%; /* Largura total */
      height: 100%; /* Altura total */
      overflow: auto; /* Habilita rolagem se necessário */
      background-color: rgba(0, 0, 0, 0.4); /* Fundo semi-transparente */
    }

    .modal-content {
      background-color: rgba(0, 255, 0, 0.8); /* Fundo verde translúcido */
      margin: 15% auto; /* Margem superior de 15% e centralizado */
      padding: 20px;
      border: 1px solid #888;
      width: 80%; /* Largura do modal */
      max-width: 500px; /* Largura máxima */
      text-align: center; /* Centraliza o texto */
      border-radius: 10px; /* Bordas arredondadas */
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
      setTimeout(fecharModal, 2000); // Fecha o modal após 5 segundos
    }

    // Função para fechar o modal
    function fecharModal() {
      document.getElementById('myModal').style.display = 'none';
    }

    // Executa a função se o login for igual a 1 ou 2
    window.onload = function() {
      <?php if ($login == 1): ?>
        mostrarModal("Login Bem-sucedido!");
      <?php elseif ($login == 2): ?>
        mostrarModal("Adicionado ao carrinho!");
      <?php endif; ?>
    };
  </script>
</head>
<body>
  <header>
      <h1>Bem-vindo à Minha Loja Online!</h1>
      <nav>
          <a href="#produtos">Produtos</a>
          <a href="carrinho.php">Carrinho</a>
          <a href="cadastro_login.php">Cadastro</a>
          <a href="contato.html">Contato</a>
          <a href="logout.php">Logout</a>
          <?php
          $user = $_SESSION['user'] ? $_SESSION['user'] : null;
          if($user == 2){
            echo "<a href='produtos/consulta.php'>Meus Produtos</a>";
            echo "<a href='clientes/consulta.php'>Clientes</a>";
          }
          ?>
      </nav>
  </header>
  <div class="welcome">
      <p>Explore nossos produtos incríveis e aproveite as melhores ofertas!</p>
  </div>
  
  <!-- Modal -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="fecharModal()">&times;</span>
      <h2 id="modalMensagem">Mensagem</h2>
    </div>
  </div>

  <section id="produtos">
      <div class="produtos">
  <?php
              include('conexao.php');
              if (!$conexao) {
                  die("Erro de conexão: " . mysqli_connect_error());
              }
              $sql = "SELECT * FROM produtos WHERE categoria=3";
              $executar = mysqli_query($conexao, $sql);

              while ($res = mysqli_fetch_array($executar)) {
                  echo "<div class='console'>";
                  echo "<img src='produtos/imagens/" . $res['foto_prod'] . "' alt='" . $res['nome_prod'] . "'>";
                  echo "<h3>" . $res['nome_prod'] . "</h3>";
                  echo "<p>" . $res['descricao'] . "</p>";
                  echo "<p><strong>R$ " . number_format($res['preco'], 2, ',', '.') . "</strong></p>";
                  echo "<form action='add_carrinho.php' method='post'>";
                  echo "<input type='hidden' name='id' value='" . $res['id_prod'] . "'>";
                  echo "<input type='hidden' name='nome' value='" . $res['nome_prod'] . "'>";
                  echo "<input type='hidden' name='preco' value='" . $res['preco'] . "'>";
                  echo "<button type='submit' class='btn-adicionar'>Adicionar ao Carrinho</button>";
                  echo "</form>";
                  echo "</div>";
              }

            
          ?>
      </div>
  </section>
  <header>
    <h1>Consoles e Acessórios</h1>
    </header>
  <section id="consoles">
      <div class="consoles">
            <?php
              if (!$conexao) {
                  die("Erro de conexão: " . mysqli_connect_error());
              }
              $sql_2 = "SELECT * FROM produtos WHERE categoria=2 OR categoria=1";
              $executar = mysqli_query($conexao, $sql_2);

              while ($res = mysqli_fetch_array($executar)) {
                 echo "<div class='console'>";
                  echo "<img src='produtos/imagens/" . $res['foto_prod'] . "' alt='" . $res['nome_prod'] . "'>";
                  echo "<h3>" . $res['nome_prod'] . "</h3>";
                  echo "<p>" . $res['descricao'] . "</p>";
                  echo "<p><strong>R$ " . number_format($res['preco'], 2, ',', '.') . "</strong></p>";
                  echo "<form action='add_carrinho.php' method='post'>";
                  echo "<input type='hidden' name='id' value='" . $res['id_prod'] . "'>";
                  echo "<input type='hidden' name='nome' value='" . $res['nome_prod'] . "'>";
                  echo "<input type='hidden' name='preco' value='" . $res['preco'] . "'>";
                  echo "<button type='submit' class='btn-adicionar'>Adicionar ao Carrinho</button>";
                  echo "</form>";
                  echo "</div>";
              }

              mysqli_close($conexao);
          ?>
      </div>
  </section>

  <footer>
      <p>&copy; 2024 Minha Loja Online. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
