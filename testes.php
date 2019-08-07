<?php

for($i=1;$i<=100;$i++){
    $pares = $i%2;
    echo($pares ==0)?"$i<br>":"";
    
}

$tabuada = 5;
for ($i = 0; $i <= 10; $i++) {
    $resultado = $tabuada * $i;
    echo "$tabuada x $i = $resultado<br>";
}
echo "<br>";

$peso = 80;
$altura = 1.80;
$imc = number_format(($peso / ($altura ** 2)), 2);

echo "Peso: $peso<br>";
echo "Altura: $altura<br>";
echo "IMC: $imc<br>";
if ($imc < 17) {
    echo "Muito abaixo do peso<br>";
}elseif($imc<=18.49) {
     echo "Abaixo do peso<br>";
}elseif($imc<=24.99){
    echo "Peso normal<br>";
}elseif($imc<=29.99){
    echo "Acima do peso<br>";
}elseif($imc<=34.99){
    echo "Obesidade I<br>";
}elseif($imc<=39.99){
    echo "Obesidade II (severa)<br>";
}else{
    echo "Obesidade III (mórbida)<br>";
}
