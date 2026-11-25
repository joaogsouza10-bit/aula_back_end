<?php
// =======================
// FUNÇÕES PARA ALUNOS
// =======================
// Cadastra um aluno no banco.
function gravar_aluno($conexao, $nome, $cpf, $curso, $login, $senha) {
// Converte CPF e senha em resumos MD5.
$cpf_md5 = md5($cpf);
$senha_md5 = md5($senha);
// Define o comando SQL com espaços reservados.
$sql = "INSERT INTO alunos
(nome, cpf, curso, login, senha)
VALUES (?, ?, ?, ?, ?)";
// Prepara o comando SQL.
$stmt = mysqli_prepare($conexao, $sql);
// Vincula os cinco valores como texto.
mysqli_stmt_bind_param(
$stmt, "sssss",
$nome, $cpf_md5, $curso, $login, $senha_md5
);
// Executa e devolve verdadeiro ou falso.
return mysqli_stmt_execute($stmt);
}
// Busca todos os alunos para a listagem.
function listar_alunos($conexao) {
$sql = "SELECT id_aluno, nome, cpf, curso, login
FROM alunos ORDER BY nome";
return mysqli_query($conexao, $sql);
}
// Busca um aluno específico pelo identificador.
function buscar_aluno($conexao, $id_aluno) {
$sql = "SELECT * FROM alunos WHERE id_aluno = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_aluno);
mysqli_stmt_execute($stmt);
return mysqli_stmt_get_result($stmt);
}
// Atualiza os dados de um aluno.
// Se a senha vier vazia, mantém a senha que já está no banco.
function atualizar_aluno($conexao, $id_aluno, $nome, $cpf, $curso, $login, $senha) {
if ($senha != "") {
$cpf_md5 = md5($cpf);
$senha_md5 = md5($senha);
$sql = "UPDATE alunos
SET nome=?, cpf=?, curso=?, login=?, senha=?
WHERE id_aluno=?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param(
$stmt, "sssssi",
$nome, $cpf_md5, $curso, $login, $senha_md5, $id_aluno
);
} else {
$cpf_md5 = md5($cpf);
$sql = "UPDATE alunos
SET nome=?, cpf=?, curso=?, login=?
WHERE id_aluno=?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param(
$stmt, "ssssi",
$nome, $cpf_md5, $curso, $login, $id_aluno
);
}
return mysqli_stmt_execute($stmt);
}
// Exclui um aluno pelo ID.
function excluir_aluno($conexao, $id_aluno) {
$sql = "DELETE FROM alunos WHERE id_aluno = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_aluno);
return mysqli_stmt_execute($stmt);
}
// ===========================
// FUNÇÕES PARA PROFESSORES
// ===========================
// Cadastra um professor.
function gravar_professor($conexao, $nome, $cpf, $curso, $login, $senha) {
$cpf_md5 = md5($cpf);
$senha_md5 = md5($senha);
$sql = "INSERT INTO professores
(nome, cpf, curso, login, senha)
VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param(
$stmt, "sssss",
$nome, $cpf_md5, $curso, $login, $senha_md5
);
return mysqli_stmt_execute($stmt);
}
// Lista os professores sem exibir a senha.
function listar_professores($conexao) {
$sql = "SELECT id_professor, nome, cpf, curso, login
FROM professores ORDER BY nome";
return mysqli_query($conexao, $sql);
}
// Busca um professor pelo ID.
function buscar_professor($conexao, $id_professor) {
$sql = "SELECT * FROM professores WHERE id_professor = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_professor);
mysqli_stmt_execute($stmt);
return mysqli_stmt_get_result($stmt);
}
// Atualiza os dados do professor.
function atualizar_professor($conexao, $id_professor, $nome, $cpf, $curso, $login, $senha) {
$cpf_md5 = md5($cpf);
if ($senha != ""){
$senha_md5 = md5($senha);
$sql = "UPDATE professores
SET nome=?, cpf=?, curso=?, login=?, senha=?
WHERE id_professor=?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param(
$stmt, "sssssi",
$nome, $cpf_md5, $curso, $login, $senha_md5, $id_professor
);
} else {
$sql = "UPDATE professores
SET nome=?, cpf=?, curso=?, login=?
WHERE id_professor=?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param(
$stmt, "ssssi",
$nome, $cpf_md5, $curso, $login, $id_professor
);
}
return mysqli_stmt_execute($stmt);
}
// Exclui um professor.
function excluir_professor($conexao, $id_professor) {
$sql = "DELETE FROM professores WHERE id_professor = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_professor);
return mysqli_stmt_execute($stmt);
}
?>