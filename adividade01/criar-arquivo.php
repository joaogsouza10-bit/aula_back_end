<?php 
$arquivo = fopen("dados.txt", "w");
fwrite($arquivo, "Primeiro linha de texto\n");
fclose($arquivo);
?>