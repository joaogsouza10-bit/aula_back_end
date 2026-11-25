
<?php

require_once "conexao.php";
require_once "functions.php";

// Recebe o ID pela URL e converte para inteiro
$id_aluno = (int)($_GET["id"] ?? 0);

// Se o formulário foi enviado, atualiza os dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome  = trim($_POST["nome"]);
    $cpf   = trim($_POST["cpf"]);
    $curso = trim($_POST["curso"]);
    $login = trim($_POST["login"]);
    $senha = $_POST["senha"];

    // Atualiza os dados do aluno
    if (atualizar_aluno(
        $conexao,
        $id_aluno,
        $nome,
        $cpf,
        $curso,
        $login,
        $senha
    )) {

        header("Location: listar_alunos.php");
        exit;
    }

    echo "Não foi possível atualizar.";
}

// Busca os dados atuais para preencher o formulário
$resultado = buscar_aluno($conexao, $id_aluno);
$aluno = mysqli_fetch_assoc($resultado);

// Verifica se o aluno existe
if (!$aluno) {
    die("Aluno não encontrado.");
}

?>

<h1>Editar aluno</h1>

<form method="POST">

    Nome:
    <input
        name="nome"
        value="<?= htmlspecialchars($aluno["nome"]) ?>"
        required
    >
    <br>

    CPF:
    <input
        name="cpf"
        value=""
        placeholder="Digite novamente o CPF"
        required
    >
    <br>

    Curso:
    <input
        name="curso"
        value="<?= htmlspecialchars($aluno["curso"]) ?>"
        required
    >
    <br>

    Login:
    <input
        name="login"
        value="<?= htmlspecialchars($aluno["login"]) ?>"
        required
    >
    <br>

    Nova senha:
    <input
        type="password"
        name="senha"
    >
    <br>

    <small>
        Deixe a senha vazia para manter a atual.
    </small>
    <br>

    <button type="submit">
        Salvar alterações
    </button>

</form>
