
<?php

require_once "conexao.php";
require_once "functions.php";

// Solicita a lista de professores ao arquivo de funções
$resultado = listar_professores($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Professores cadastrados</title>

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
            padding: 40px 20px;
        }

        .container {
            background: white;
            max-width: 1100px;
            margin: auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
            overflow-x: auto;
        }

        h1 {
            text-align: center;
            color: #1e3c72;
            margin-bottom: 25px;
        }

        .cadastrar {
            display: inline-block;
            background: #1e3c72;
            color: white;
            padding: 12px 18px;
            border-radius: 7px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .cadastrar:hover {
            background: #2a5298;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th {
            background: #1e3c72;
            color: white;
            padding: 14px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f0f4fa;
        }

        .editar {
            color: #16803c;
            text-decoration: none;
            font-weight: bold;
        }

        .excluir {
            color: #dc2626;
            text-decoration: none;
            font-weight: bold;
        }

        .voltar {
            display: inline-block;
            margin-top: 25px;
            color: #1e3c72;
            text-decoration: none;
            font-weight: bold;
        }

        .voltar:hover {
            text-decoration: underline;
        }

    </style>

</head>

<body>

    <div class="container">

        <h1>Professores cadastrados</h1>

        <a href="gravar_professor.php" class="cadastrar">
            + Cadastrar novo professor
        </a>

        <table>

            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Curso</th>
                <th>Login</th>
                <th>Ações</th>
            </tr>

            <?php while ($professor = mysqli_fetch_assoc($resultado)) { ?>

                <tr>

                    <td>
                        <?= (int)$professor["id_professor"] ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($professor["nome"]) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($professor["cpf"]) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($professor["curso"]) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($professor["login"]) ?>
                    </td>

                    <td>

                        <a
                            href="editar_professor.php?id=<?= (int)$professor["id_professor"] ?>"
                            class="editar"
                        >
                            Editar
                        </a>

                        |

                        <a
                            href="excluir_professor.php?id=<?= (int)$professor["id_professor"] ?>"
                            class="excluir"
                            onclick="return confirm('Deseja excluir este professor?')"
                        >
                            Excluir
                        </a>

                    </td>

                </tr>

            <?php } ?>

        </table>

        <a href="index.php" class="voltar">
            Voltar ao início
        </a>

    </div>

</body>
</html>
