<?php

require_once("./conexao.php");

$stmt = $conn->prepare("SELECT nome FROM alunos 
				WHERE idade >= ? AND idade <= ?");

// pode-se usar um vetor, com uma posição para cada parâmetro
$stmt->execute([20, 25]); 
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
   print $row['nome'] . "\n";
}


echo "\nReaproveitando a consulta preparada...\n";
$stmt->execute([15, 30]); 
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
   print $row['nome'] . "\n";
}

?>