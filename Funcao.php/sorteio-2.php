
<?php
session_start();

// Inicializar sorteio
if (!isset($_SESSION['resultado'])) {
    $_SESSION['resultado'] = null;
}

if (isset($_POST['sortear'])) {

    $premio = htmlspecialchars(trim($_POST['premio']));
    $inicio = intval($_POST['inicio']);
    $fim = intval($_POST['fim']);

    if ($premio != "" && $inicio > 0 && $fim >= $inicio) {

        $numero = random_int($inicio, $fim);

        $_SESSION['resultado'] = [
            "numero" => $numero,
            "premio" => $premio,
            "data" => date("d/m/Y H:i:s")
        ];

    } else {
        $erro = "Preencha os campos corretamente!";
    }
}

// Novo sorteio
if (isset($_POST['novo'])) {
    $_SESSION['resultado'] = null;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Rifa Premiada</title>

<style>
body {
    font-family: Arial;
    background: linear-gradient(135deg, #141e30, #243b55);
    color: white;
    text-align: center;
    padding: 40px;
}

.container {
    background: white;
    color: black;
    max-width: 450px;
    margin: auto;
    padding: 30px;
    border-radius: 15px;
}

input {
    width: 90%;
    padding: 12px;
    margin: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
}

button {
    background: #007bff;
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
}

button:hover {
    background: #0056b3;
}

.resultado {
    background: #d4edda;
    color: #155724;
    padding: 20px;
    margin-top: 20px;
    border-radius: 10px;
}

.erro {
    color: red;
}
</style>
</head>

<body>

<div class="container">

    <h1>🎉 RIFA PREMIADA 🎉</h1>

    <form method="POST">

        <label>Nome do prêmio:</label>
        <input type="text" name="premio"
        placeholder="Ex: Moto, Celular, Bicicleta" required>

        <label>Número inicial:</label>
        <input type="number" name="inicio"
        value="1" min="1" required>

        <label>Número final:</label>
        <input type="number" name="fim"
        value="100" min="1" required>

        <button type="submit" name="sortear">
            🎲 REALIZAR SORTEIO
        </button>

    </form>

    <?php if (isset($erro)) { ?>
        <p class="erro"><?php echo $erro; ?></p>
    <?php } ?>

    <?php if ($_SESSION['resultado'] != null) { ?>

        <div class="resultado">

            <h2>🏆 RESULTADO DO SORTEIO</h2>

            <h1>
                Número:
                <?php echo $_SESSION['resultado']['numero']; ?>
            </h1>

            <h2>
                Prêmio:
                <?php echo $_SESSION['resultado']['premio']; ?>
            </h2>

            <p>
                Data:
                <?php echo $_SESSION['resultado']['data']; ?>
            </p>

        </div>

        <br>

        <form method="POST">
            <button type="submit" name="novo">
                NOVO SORTEIO
            </button>
        </form>

    <?php } ?>

</div>

</body>
</html>
