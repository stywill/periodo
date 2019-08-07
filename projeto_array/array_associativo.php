<?php
namespace Classes;
require 'autoload.php';
$correntista = [
    "Giovanni",
    "João",
    "Maria",
    "Luis",
    "Luisa",
    "Rafael"
];

$saldos = [
    2500,
    3000,
    4400,
    1000,
    8700,
    9000
];

$relacionados = array_merge($correntista,$saldos);
echo "<p><h1>Usando array_merge</h1></p>";
var_dump($relacionados);
echo "<br>";
$relacionados = array_combine($correntista,$saldos);
echo "<p><h1>Usando array_combine criando um array associativo</h1></p>";
var_dump($relacionados);
echo "<br>";
echo "<p><h1>Adicionando</h1></p>";
$relacionados["Wilson"] = 4500;
var_dump($relacionados);
echo "<br>";
echo "<p><h1>Imprimindo nomes e saldos</h1></p>";

$chave = "João";

if(array_key_exists($chave,$relacionados)){
    echo "<p>O saldo do $chave é : {$relacionados[$chave]}</p>";
}else{
    echo "<p>Não foi encotrado</p>";
}
echo "<br>";

$maiores = ArrayUtils::encontrarPessoasComSaldoMaior(4000, $relacionados);

var_dump($maiores);