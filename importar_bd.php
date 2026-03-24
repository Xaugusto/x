<?php
// SCRIPT DE IMPORTAÇÃO DO BANCO DE DADOS - DELETAR APÓS USAR

echo "<h1>Importar Banco de Dados</h1>";

// Configuração
$host = 'mysql.railway.internal';
$port = 3306;
$user = 'root';
$password = 'RunvOBucCxzGdWtCJkXISEMdgOTLTKZg';
$database = 'railway';

echo "<p>Conectando em: $host:$port</p>";

// Conectar
$conexao = @mysqli_connect($host, $user, $password, $database, $port);

if (!$conexao) {
    echo "<h2 style='color: red;'>✗ Erro na conexão:</h2>";
    echo "<p>" . mysqli_connect_error() . "</p>";
    exit;
}

echo "<h2 style='color: green;'>✓ Conectado com sucesso!</h2>";

// Ler arquivo SQL
$sql_file = 'database_x.sql';

if (!file_exists($sql_file)) {
    echo "<p style='color: red;'>Arquivo $sql_file não encontrado!</p>";
    exit;
}

$sql_content = file_get_contents($sql_file);

// Dividir em queries individuais
$queries = array_filter(array_map('trim', preg_split('/;[\s\n]*/', $sql_content)));

echo "<p>Total de queries encontradas: " . count($queries) . "</p>";
echo "<hr>";

$success = 0;
$errors = 0;

// Executar cada query
foreach ($queries as $i => $query) {
    if (empty($query)) continue;
    
    echo "<p><strong>Query " . ($i + 1) . ":</strong> " . substr($query, 0, 60) . "...</p>";
    
    if (mysqli_query($conexao, $query)) {
        echo "<span style='color: green;'>✓ OK</span><br>";
        $success++;
    } else {
        echo "<span style='color: red;'>✗ ERRO: " . mysqli_error($conexao) . "</span><br>";
        $errors++;
    }
}

echo "<hr>";
echo "<h2 style='color: green;'>Importação concluída!</h2>";
echo "<p>Sucesso: $success queries</p>";
if ($errors > 0) {
    echo "<p style='color: orange;'>Erros: $errors queries</p>";
}

// Listar tabelas criadas
echo "<h2>Tabelas no banco:</h2>";
$result = mysqli_query($conexao, "SHOW TABLES");
echo "<ul>";
while ($row = mysqli_fetch_row($result)) {
    echo "<li>" . $row[0] . "</li>";
}
echo "</ul>";

mysqli_close($conexao);

echo "<p><strong>Próximo passo:</strong> Deletar este arquivo (importar_bd.php) do servidor!</p>";
?>
