<?php
    require_once("./conexao.php");
    
    $sql = "DROP TABLE IF EXISTS alunos; ";
    $sql .= "CREATE TABLE alunos (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(30) NOT NULL,
        idade INT);";

    try {
        $conn->exec($sql);
        echo "A tabela alunos foi criada com sucesso!\n";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
?>