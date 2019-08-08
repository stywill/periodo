<?php
ini_set('display_errors',1);
 error_reporting(E_ALL);
 header('Content-Type: text/html; charset=utf-8');

require_once 'autoload.php';

use classes\Validacao;
use classes\ContaCorrente;
use exception\SaldoInsuficienteException;

$contaJoao = new ContaCorrente("João","5199","122221-2",500.00);
$contaJose = new ContaCorrente("José","7896","4343343-2",1500.00);
$contaMaria = new ContaCorrente("Maria","6541","4343341-2",3500.00);
$contaWilson = new ContaCorrente("Wilson","42863","4752135-2",6500.00);
$contaJuliana = new ContaCorrente("Juliana","123456","4752135-2",8000.00);
$contaIsabel = new ContaCorrente("Isabel","23456","4752135-2",500.00);
$contaVicente = new ContaCorrente("Vicente","09876","789654-2",1700.00);


echo "<h1>conhecendo exceções 2.</h1><br>";
echo "contador de contas e divisor de taxa<br>";

echo "Total de contas :".ContaCorrente::$totalDeContas."<br>";
echo "Taxa :".ContaCorrente::$taxaOperacao."<br>";

echo "<br>";

echo "<h2>Conta Corrente: Titular: ".$contaJoao->__get("titular")."</h2>";
var_dump($contaJoao);


try {
    $contaJoao["teste"];
} catch (Error $exc) {
    echo $exc->getMessage();
}

echo "<h3>Transferir</h3>";
try{
    $contaJoao->transferir(50, $contaMaria);
} catch (InvalidArgumentException $erro){
    echo "Invalid Argument<br>";
    echo $erro->getMessage();
} catch (Exception $erro){
    echo "Exception<br>";
    echo $erro->getMessage();
}
var_dump($contaJoao);

echo "<h1>Criando nossas exceções </h1><br>";
echo "<p>Exceção para o metodo sacar</p>";
var_dump($contaWilson);

$contaWilson->sacar(7000);
echo "<br>";

var_dump($contaWilson);
