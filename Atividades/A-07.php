<?php

require_once 'funcao.php';

$resultado = "";

if (isset($_POST['numero'])) {
    $numero = $_POST['numero'];

    $resultado = veriimpar($numero);
}
?>

<!DOCTYPE html>
<html>

<body>

    <form action="impar_par.php" method="post">
        Digite um número: <input type="number" name="numero"><br>
        <input type="submit" value="Verificar">
    </form>

    
    <?php
    if ($resultado != "") {
        echo  $resultado;
    }
    ?>

</body>
</html>