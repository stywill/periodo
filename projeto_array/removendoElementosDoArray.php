<?php

declare (strict_types = 1);
namespace Classes;
require 'autoload.php';

$correntistas_e_compras = [
    "Giovanni",
    12,
    "Maria",
    25,
    "Luis",
    "Luísa",
    "12"
];

echo "<pre><h1>Removendo elemento de um array -> PHP Type Juggling</h1></pre>";

var_dump($correntistas_e_compras);

ArrayUtils::remover(12, $correntistas_e_compras);

var_dump($correntistas_e_compras);
