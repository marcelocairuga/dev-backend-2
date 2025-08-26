<?php

require_once("./conexao.php");

$stmt = $conn->prepare("SELECT nome FROM alunos 
				WHERE idade >= ? AND idade <= ?");

// ou pode-se vincular a valores ou variáveis pela posição
$min = 20;
$max = 25;
$stmt->bindValue(1, $min);
$stmt->bindValue(2, $max);
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $row) {
   print $row['nome'] . "\n";
}

?>