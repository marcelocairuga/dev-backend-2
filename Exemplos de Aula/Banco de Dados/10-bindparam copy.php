<?php

require_once("./01-exec.php");

$alunos = [
   ["nome" => "Elesbão", "idade" => 21],
   ["nome" => "Genoveva", "idade" => 20],
   ["nome" => "Raoni", "idade" => 19],
   ["nome" => "Estela", "idade" => 21]
];

$sql = "INSERT INTO alunos (nome, idade) 
        VALUES (:nome, :idade);";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":idade", $idade);

foreach($alunos as $aluno) {
    $nome = $aluno["nome"];
    $idade = $aluno['idade'];
    $stmt->execute();
}



$stmt = $conn->prepare("SELECT * FROM alunos"); 
$stmt->execute();  
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
   echo $row['nome'] . " - " . $row['idade'] . "\n";
}


?>