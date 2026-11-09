<?php
$temperatura = 40;
$tipo = "C";

if ($tipo == "C"){
    $resultado = ($temperatura * 9 / 5) + 32;
    echo $temperatura . "°C =" . $resultado . "°F";
}else{
    $resultado = ($temperatura - 32) * 5 / 9;
    echo $temperatura . "°F = " . $resultado . "°C";
}

?>