

<?php

// Dados para conectar ao MySQL local
$servidor = "localhost";
$banco    = "dbescola";
$usuario  = "root";
$senha    = "123456";

// Abre a conexão com o banco de dados
$conexao = mysqli_connect(
    $servidor,
    $usuario,
    $senha,
    $banco
);

// Verifica se a conexão foi realizada
if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Define o padrão de caracteres para aceitar acentos
mysqli_set_charset($conexao, "utf8mb4");

?>

