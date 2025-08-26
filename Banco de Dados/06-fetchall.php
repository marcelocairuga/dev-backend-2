<?php

require_once("./conexao.php");

$sql = "SELECT * FROM alunos";
$stmt = $conn->query($sql);

$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($alunos as $aluno) {
   print "Nome: " . $aluno["nome"] . " \t\t ";
   print "Idade: " . $aluno["idade"] . PHP_EOL;
}


?>