<?php

require_once 'funcao.php';


$resultado = "";


if (isset($_POST['num1'])) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    
    $resultado = calcsoma($num1, $num2);
}
?>

<!DOCTYPE html>
<html>

<body>
    
    <form action="soma.php" method="post">
        Número 1: <input type="number" name="num1"><br>
        Número 2: <input type="number" name="num2"><br>
        <input type="submit" value="Calcular">
    </form>

   
    <?php
    if ($resultado != "") {
        echo "Resultado: $resultado";
    }
    ?>

</body>
</html>