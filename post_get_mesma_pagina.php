<form method="POST" action="post_get_mesma_pagina.php">
cor: <br>
<input type="text" name="cor" value=""><br>
tipo: <br>
<input type="text" name="tipo" value=""><br>

<input type="submit" value="cadastrar">

</form>

<?php 
$cor = $_POST['cor']?? "";
$tipo = $_POST['tipo']?? "";
$produto = $_GET['produto']?? "(Não selecionado)";

if(isset($_POST["cor"])){
    //empt retorna null caso a variável exixta
    //isset retorna FALSE se não existir e TRUE se existir
   echo "A cor do $produto é $cor do tipo $tipo"; 
}
?>