<?php

require_once 'funcao.php';

$resultado = "";


if (isset($_POST['numero'])) {
    $numero = $_POST['numero'];

    
    $resultado = Tabuada($numero);
}
?>

<!DOCTYPE html>
<html>

<body>


   
    <form action="tabuada.php" method="post">
        Digite um número: <input type="number" name="numero"><br>
        <input type="submit" value="Tabuada">
    </form>

   
    <?php
    if ($resultado != "") {
        echo "Resultado:";
        echo $resultado;
    }
    ?>

</body>
</html>