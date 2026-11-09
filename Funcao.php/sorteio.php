<?php
session_start();

// Tempo limite de 1 minuto e 4 segundos
$tempoLimite = 64;

// Iniciar cronômetro
if (!isset($_SESSION['inicio'])) {
    $_SESSION['inicio'] = time();
}

// Calcular tempo restante
$restante = max(0, $tempoLimite - (time() - $_SESSION['inicio']));

// Sair da rifa
if (isset($_POST['sair'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Realizar sorteio
if (isset($_POST['sortear']) && $restante > 0) {

    $premio = htmlspecialchars(trim($_POST['premio']));
    $jogador = htmlspecialchars(trim($_POST['jogador']));

    $inicio = intval($_POST['inicio']);
    $fim = intval($_POST['fim']);
    $porcentagem = intval($_POST['porcentagem']);

    if ($premio != "" && $jogador != "" &&
        $inicio >= 1 && $fim >= $inicio &&
        $porcentagem >= 0 && $porcentagem <= 100) {

        $numero = random_int($inicio, $fim);
        $chance = random_int(1, 100);

        if ($chance <= $porcentagem) {
            $resultado = "🏆 GANHOU!";
        } else {
            $resultado = "NÃO GANHOU!";
        }

        $_SESSION['jogador'] = $jogador;
        $_SESSION['numero'] = $numero;
        $_SESSION['premio'] = $premio;
        $_SESSION['resultado'] = $resultado;

    } else {
        $erro = "Preencha os campos corretamente!";
    }
}

// Ranking de 1 a 10 após o tempo acabar
if ($restante <= 0 && !isset($_SESSION['ranking'])) {
    $_SESSION['ranking'] = [];

    for ($i = 1; $i <= 10; $i++) {
        $_SESSION['ranking'][] = [
            "posicao" => $i,
            "pontos" => random_int(1, 100)
        ];
    }

    usort($_SESSION['ranking'], function($a, $b) {
        return $b['pontos'] - $a['pontos'];
    });
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
    background: linear-gradient(135deg, #172554, #312e81);
    color: white;
    text-align: center;
    padding: 20px;
}

.container {
    background: white;
    color: black;
    max-width: 430px;
    margin: auto;
    padding: 25px;
    border-radius: 15px;
}

input {
    width: 90%;
    padding: 10px;
    margin: 8px;
    border: 1px solid #ccc;
    border-radius: 7px;
}

button {
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    color: white;
    background: green;
    margin: 5px;
}

button:disabled {
    background: gray;
    cursor: not-allowed;
}

.sair {
    background: red;
}

.resultado {
    background: #d1fae5;
    color: black;
    padding: 15px;
    border-radius: 10px;
    margin-top: 20px;
}

.ranking {
    background: #e0e7ff;
    color: #172554;
    padding: 15px;
    margin-top: 20px;
    border-radius: 10px;
}

</style>

<script>
let tempo = <?php echo $restante; ?>;

function cronometro() {

    let minutos = Math.floor(tempo / 60);
    let segundos = tempo % 60;

    document.getElementById("tempo").innerHTML =
        minutos + ":" + String(segundos).padStart(2, "0");

    if (tempo <= 0) {
        document.getElementById("status").innerHTML =
            "⏰ TEMPO ESGOTADO!";
        document.getElementById("botao").disabled = true;

        // Atualizar o PHP para gerar o ranking
        window.location.reload();
        return;
    }

    tempo--;
    setTimeout(cronometro, 1000);
}

window.onload = cronometro;
</script>

</head>

<body>

<div class="container">

<h1>🎉 RIFA PREMIADA 🎉</h1>

<h2>Tempo restante:</h2>
<h1 id="tempo" style="color:red;">01:04</h1>

<p id="status"></p>

<?php if ($restante > 0) { ?>

<form method="POST">

    <label>Nome do prêmio:</label>
    <input type="text" name="premio"
    placeholder="Ex: Moto" required>

    <label>Nome do jogador:</label>
    <input type="text" name="jogador"
    placeholder="Ex: João" required>

    <label>Número inicial:</label>
    <input type="number" name="inicio"
    value="1" min="1" required>

    <label>Número final:</label>
    <input type="number" name="fim"
    value="100" min="1" required>

    <label>Chance de ganhar (%):</label>
    <input type="number" name="porcentagem"
    value="50" min="0" max="100" required>

    <br><br>

    <button type="submit" name="sortear" id="botao">
        🎲 SORTEAR
    </button>

</form>

<?php } ?>

<?php if (isset($_SESSION['numero'])) { ?>

<div class="resultado">

    <h2>🏆 RESULTADO</h2>

    <h3>Prêmio: <?php echo $_SESSION['premio']; ?></h3>

    <h3>Jogador: <?php echo $_SESSION['jogador']; ?></h3>

    <h2>Número: <?php echo $_SESSION['numero']; ?></h2>

    <h2><?php echo $_SESSION['resultado']; ?></h2>

</div>

<?php } ?>

<?php if ($restante <= 0) { ?>

<div class="ranking">

    <h2>🏆 RANKING FINAL</h2>

    <?php foreach ($_SESSION['ranking'] as $item) { ?>

        <p>
            <?php echo $item['posicao']; ?>º lugar -
            <?php echo $item['pontos']; ?> pontos
        </p>

    <?php } ?>

</div>

<?php } ?>

<?php if (isset($erro)) { ?>
    <p style="color:red;">
        <?php echo $erro; ?>
    </p>
<?php } ?>

<br>

<form method="POST">
    <button type="submit" name="sair" class="sair">
        🚪 SAIR DA RIFA
    </button>
</form>

</div>

</body>
</html>
