<?php 
$peso = 107;
$altura = 2.88;

$imc = $peso / ($altura * $altura);

echo "Seu IMC é: " . $imc . "<br>";

if ($imc < 18.5){
    echo "abaixo do peso";
}elseif ($imc < 25){
    echo "peso normal";
}elseif ($imc < 30){
    echo "sobrepeso";
}else{
    echo "obesidade";
}

?>