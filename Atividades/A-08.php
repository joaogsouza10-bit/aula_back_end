<?php
require_once 'funcao.php';

$resultado = "";

if (isset($_POST['n1'])) {
    $n1 = $_POST['n1'];
    $n2 = $_POST['n2'];
    $n3 = $_POST['n3'];

    $resultado = calcmedia($n1, $n2, $n3);
}
?>

<!DOCTYPE html>
<html>

<body>

    <form action="media.php" method="post">
        Número 1: <input type="number" name="n1"><br>
        Número 2: <input type="number" name="n2"><br>
        Número 3: <input type="number" name="n3"><br>
        <input type="submit" value="Calcular Média">
    </form>

    <?php
    if ($resultado != "") {
        echo "A média é: " . $resultado;
    }
    ?>

</body>
</html>