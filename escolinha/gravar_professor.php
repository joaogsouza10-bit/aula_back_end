
<?php

require_once "conexao.php";
require_once "functions.php";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Captura os dados enviados pelo formulário
    $nome  = trim($_POST["nome"]);
    $cpf   = trim($_POST["cpf"]);
    $curso = trim($_POST["curso"]);
    $login = trim($_POST["login"]);
    $senha = $_POST["senha"];

    // Executa a função de cadastro do professor
    if (gravar_professor(
        $conexao,
        $nome,
        $cpf,
        $curso,
        $login,
        $senha
    )) {
        $mensagem = "Professor cadastrado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar professor.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Professor</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            width: 400px;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
        }

        h1 {
            text-align: center;
            color: #1e3c72;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 7px;
            outline: none;
        }

        input:focus {
            border-color: #2a5298;
        }

        button {
            width: 100%;
            padding: 13px;
            background: #1e3c72;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #2a5298;
        }

        .mensagem {
            text-align: center;
            color: #16803c;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .voltar {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #1e3c72;
            text-decoration: none;
        }

        .voltar:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>

    <div class="container">

        <h1>Cadastro de professor</h1>

        <?php if (isset($mensagem)) { ?>
            <p class="mensagem">
                <?= htmlspecialchars($mensagem) ?>
            </p>
        <?php } ?>

        <form method="POST">

            <label>Nome:</label>
            <input
                type="text"
                name="nome"
                placeholder="Digite o nome"
                required
            >

            <label>CPF:</label>
            <input
                type="text"
                name="cpf"
                placeholder="Digite o CPF"
                required
            >

            <label>Curso:</label>
            <input
                type="text"
                name="curso"
                placeholder="Digite o curso"
                required
            >

            <label>Login:</label>
            <input
                type="text"
                name="login"
                placeholder="Crie um login"
                required
            >

            <label>Senha:</label>
            <input
                type="password"
                name="senha"
                placeholder="Crie uma senha"
                required
            >

            <button type="submit">
                Gravar professor
            </button>

        </form>

        <a href="index.php" class="voltar">
            Voltar ao início
        </a>

    </div>

</body>
</html>
