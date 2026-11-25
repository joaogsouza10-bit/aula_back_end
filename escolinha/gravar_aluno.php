

<?php

// Inclui a conexão e as funções
require_once "conexao.php";
require_once "functions.php";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recebe os dados enviados pelo formulário
    $nome  = trim($_POST["nome"]);
    $cpf   = trim($_POST["cpf"]);
    $curso = trim($_POST["curso"]);
    $login = trim($_POST["login"]);
    $senha = $_POST["senha"];

    // Cadastra o aluno
    if (gravar_aluno(
        $conexao,
        $nome,
        $cpf,
        $curso,
        $login,
        $senha
    )) {
        $mensagem = "Aluno cadastrado com sucesso!";
    } else {
        $mensagem = "Erro ao cadastrar aluno. Verifique os dados.";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Aluno</title>

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
            color: #333;
            font-weight: bold;
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

        .mensagem {
            text-align: center;
            margin-bottom: 15px;
            color: #16803c;
            font-weight: bold;
        }

    </style>

</head>

<body>

    <div class="container">

        <h1>Cadastro de aluno</h1>

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
                placeholder="Digite seu nome"
                required
            >

            <label>CPF:</label>
            <input
                type="text"
                name="cpf"
                placeholder="Digite seu CPF"
                required
            >

            <label>Curso:</label>
            <input
                type="text"
                name="curso"
                placeholder="Digite seu curso"
                required
            >

            <label>Login:</label>
            <input
                type="text"
                name="login"
                placeholder="Crie seu login"
                required
            >

            <label>Senha:</label>
            <input
                type="password"
                name="senha"
                placeholder="Crie sua senha"
                required
            >

            <button type="submit">
                Gravar aluno
            </button>

        </form>

        <a href="index.php" class="voltar">
            Voltar ao início
        </a>

    </div>

</body>
</html>
