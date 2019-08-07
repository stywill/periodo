<?php

require_once 'autoload.php';

use classes\funcionarios\Diretor;
use classes\Diretor as Diretor2;
use classes\funcionarios\Designer;
use classes\abstratas\Funcionario;
use classes\sistemaInterno\GerenciadorBonificacao;
Funcionario::setPiso(4569.00);
$diretor = new Diretor("29759276810");
$designer = new Designer("222002211");

echo "<h1>Dados iniciais</h1><br>";
var_dump($diretor);
var_dump($designer);

echo "Obs: O metodo \"aumentarSalario\" para o designer vem direto da classe Designer(Polimorfismo)<br>";
echo "<h1>Bonificações</h1><br>";
echo "Bonificação Designer: {$designer->getBonificacao()}<br>";
echo "Bonificação Diretor: {$diretor->getBonificacao()}<br>";

var_dump($diretor);
var_dump($designer);

echo "<h1>Autenticação com herença em cascata</h1><br>";
$diretor->senha = "12345";

var_dump($diretor->autenticar("12345"));

echo "<h1>Classe abstrata</h1><br>";

echo 'essa classe não pode ser instanciada diretamente$teste = new Funcionario("336665544",100.00)<br>';

echo "<h1>Entendendo tipos</h1><br>";

$gerenciador = new GerenciadorBonificacao();

//autenticação!!
$gerenciador->AutentiqueAqui($diretor, "12345");

$gerenciador->registrar($diretor);

var_dump($gerenciador->getTotalBonificacoes());
$gerenciador->registrar($designer);
var_dump($gerenciador->getTotalBonificacoes());

echo "<br>";

echo "<h1>Usando 'final' no metodo aumentar salario assim não pode ser sobrescrito </h1><br>";

var_dump($diretor);
var_dump($designer);
echo "<h1>Com aumento de salario</h1><br>";
$designer->aumentarSalario();
$diretor->aumentarSalario();
var_dump($diretor);
var_dump($designer);

echo "<h1>Sobracarga de construtores</h1><br>";