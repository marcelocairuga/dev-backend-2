<?php

require_once("./conexao.php");

// Os marcadores podem ser nomeados:
$stmt = $conn->prepare("INSERT INTO alunos (nome, idade) 
                        VALUES (:nome, :idade)");

$stmt->bindValue(":nome", "Alvirinha");
$stmt->bindValue(":idade", 37);
$stmt->execute();

$nome = "Dorotéia";
$idade = 40;
$stmt->bindValue(":nome", $nome, PDO::PARAM_STR);
$stmt->bindValue(":idade", $idade, PDO::PARAM_INT);
$stmt->execute();



$stmt = $conn->prepare("SELECT * FROM alunos"); 
$stmt->execute();  
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($rows as $row) {
   echo $row['nome'] . " - " . $row['idade'] . "\n";
}


?>