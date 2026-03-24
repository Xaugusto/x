<?php
echo "<h1>App está rodando! ✓</h1>";
echo "<p>Diretório: " . getcwd() . "</p>";
echo "<p>PHP: " . phpversion() . "</p>";
echo "<hr>";
echo "<h2>Arquivos na raiz:</h2>";
$files = scandir('.');
echo "<ul>";
foreach ($files as $f) {
    if (!in_array($f, ['.', '..', '.git', '.gitignore'])) {
        echo "<li>$f</li>";
    }
}
echo "</ul>";
?>
