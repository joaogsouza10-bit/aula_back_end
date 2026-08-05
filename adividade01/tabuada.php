*/Faça um código em que calcule a tabuada do número indicado em uma variável
com o nome de $tabuada, aplique o laço de repetição FOR \*
<?php 
$numero = $_GET[('numero')] ?? '';

for ($i = 1; $i <= 10; $i++){
    echo("$numero x $i = " . $numero * $i."<br>");
}
 ?>