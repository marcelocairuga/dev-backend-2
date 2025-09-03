<?php

    require_once("./conexao.php");

    $nome = "Genoveva";
    $idade = 23;

    $sql = "INSERT INTO alunos (nome, idade) VALUES (";
    $sql .= $conn->quote($nome) . ", ";
    $sql .= $idade . ")";
    
    $stmt = $conn->query($sql);
    
    $sql = "SELECT nome FROM alunos"; 
    
    $stmt = $conn->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);    

    foreach ($rows as $row) {
        echo $row['nome'] . "\n";
    }
?>