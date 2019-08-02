<?php

$saldos = [2500,3000,4400,1000,8700,9000];

foreach ($saldos as $saldo) {
    echo "<p>O saldo é $saldo</p>";
}

var_dump($saldos);
sort($saldos);
var_dump($saldos);

echo "O menor saldo é $saldos[0]";
echo '<br><a href="index.php">Voltar</a><br>';  