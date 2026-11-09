<?php

require_once 'funcao.php';

$resultado = null;

if (isset($_POST['numero'])) {
    $numero = (int) $_POST['numero'];

    if ($numero >= 0) {
        $resultado = calcfatorial($numero);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Fatorial</title>
</head>

<body>

    <form action="A-06.php" method="post">
        Digite um número:
        <input type="number" name="numero" min="0" required>
        <br>
        <input type="submit" value="Calcular Fatorial">
    </form>

    <?php
    if ($resultado !== null) {
        echo "O fatorial é: " . $resultado . "<br>";
    }
    ?>

</body>

</html>
