<?php
ini_set('display_errors',1);
 error_reporting(E_ALL);
 header('Content-Type: text/html; charset=utf-8');


require "Validacao.php";
require "ContaCorrente.php";


$contaCorrenteJoao = new ContaCorrente("João","5199","122221-2",500.00);
$contaCorrenteJose = new ContaCorrente("José","5199","4343343-2",1500.00);

$contaCorrenteJoao->sacar(30);

var_dump($contaCorrenteJoao);