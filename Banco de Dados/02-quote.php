<?php

require_once("./conexao.php");

$nome = "Elesbão";
$idade = 19;
$sql = "INSERT INTO alunos (nome, idade) VALUES (";
$sql .= $conn->quote($nome) . ", ";
$sql .= $idade . ")";

$rowsAffected = $conn->exec($sql);
$id = $conn->lastInsertId();

echo "O aluno foi cadastrado com sucesso!\n";
echo "Linhas afetadas: $rowsAffected\n";
echo "ID do novo aluno: $id\n";

?>