<?php
$nomes = "Giovani,João,Maria,Pedro";
$array_nomes = explode(",", $nomes);
foreach ($array_nomes as $nome) {
    echo "<p>$nome</p>";
}

$nomesJuntos = implode(",", $array_nomes);

echo "<p>$nomesJuntos</p>";

echo '<br><a href="index.php">Voltar</a><br>';  