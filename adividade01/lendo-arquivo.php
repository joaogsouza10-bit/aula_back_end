<?php 
$arquivo = fopen("dados.txt", "r");
while(!feof($arquivo)){
    echo fgets($arquivo) . "<br>";
}
fclose($arquivo);
?>