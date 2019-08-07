<?php
namespace Classes;
require 'autoload.php';



$notaPortugues = 9;
$notaMatematica = 3;
$notaGeografia = 10;
$notaHistoria = 5;
$notaQuimica = 10;
echo "<p>A nota de Portugues é: $notaPortugues</p>";
echo "<p>A nota de Matematica é: $notaMatematica</p>";
echo "<p>A nota de Geografia é: $notaGeografia</p>";
echo "<p>A nota de Historia é: $notaHistoria</p>";
echo "<p>A nota de Quimica é: $notaQuimica</p>";

$media = ($notaPortugues+$notaMatematica+$notaGeografia+$notaHistoria+$notaQuimica)/5;

echo "<p>A Média é: $media</p>";


echo "<h1>Agora com array</h1>";

$notas = [9,3,10,5,10,8];
/*
echo "<p>A nota de Portugues é: $notas[0]</p>";
echo "<p>A nota de Matematica é: $notas[1]</p>";
echo "<p>A nota de Geografia é: $notas[2]</p>";
echo "<p>A nota de Historia é: $notas[3]</p>";
echo "<p>A nota de Quimica é: $notas[4]</p>";
echo "<p>A nota de Artes é: $notas[5]</p>";
*/

$calculadora = new Calculadora();

$media = $calculadora->calculaMedia($notas);

echo ($media)?"<p>A Média é: $media</p>":"<p>Não foi possivel calcular a média</p>";

echo '<a href="index.php">Voltar</a><br>';        