<?php

require_once("./conexao.php");

$sql = "SELECT * FROM alunos";
$stmt = $conn->query($sql);

while ($aluno = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print "Nome: " . $aluno["nome"] . " \t\t ";
    print "Idade: " . $aluno["idade"] . PHP_EOL;
}

$stmt = $conn->query($sql);

echo "\nRepetindo....\n";

while ($aluno = $stmt->fetch(PDO::FETCH_OBJ)) {
    print "Nome: " . $aluno->nome . " \t\t ";
    print "Idade: " . $aluno->idade . PHP_EOL;
}

?>