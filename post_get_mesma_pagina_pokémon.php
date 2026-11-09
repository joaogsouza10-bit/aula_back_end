<form method="POST" action="post_get_mesma_pagina.php">
nome do pokemon: <br>
<input type="text" name="pokemon" value=""><br>
tipo: <br>
<input type="text" name="tipo" value=""><br>

<input type="submit" value="cadastrar">

</form>

<?php 
$pokemon = $_POST['pokemon']?? "";
$tipo = $_POST['tipo']?? "";
$nome = $_GET['nome']?? "(Não selecionado)";

if(isset($_POST["pokemon"])){
    //empt retorna null caso a variável exixta
    //isset retorna FALSE se não existir e TRUE se existir
   echo "O nome do $nome pokemon é $pokemon do tipo $tipo";
}
?>