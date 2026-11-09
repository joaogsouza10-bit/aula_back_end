<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Calculadora de Desconto</title>
</head>
<body>
    <h1>Calculadora de Desconto</h1>

    <form method="post">

         <label>Nome do produto:</label><br>
         <input type="text" name="produto" required>
         <br><br>

         <label>Valor do produto:</label><br>
         <input type="number" name="valor"d step="0.01" required>
         <br><br>

         <label>Desconto (%):</label><br>
         <input type="number" name="desconto" step="0.01" required>
         <br><br>

         <input type="submit" value="Calcular">

    </form>

    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $produto = $_POST["produto"];
        $valor = $_POST["valor"];
        $desconto = $_POST["desconto"];

        $valorDesconto = $valor * ($desconto / 100);

        $valorFinal = $valor - $valorDesconto;

        echo "<h2>Resultado</h2>";

        echo "Produto: " . $produto . "<br>";
        echo "Valor original: R$ " . $valor . "<br>";
        echo "Desconto: " . $desconto . "%<br>";
        echo "Valor do desconto: R$ " . $valorDesconto . "<br>";
        echo "<strong>valor final: R$ " . $valorDesconto . "</strong>";

        
    }

    ?>
            
</body>
</html>