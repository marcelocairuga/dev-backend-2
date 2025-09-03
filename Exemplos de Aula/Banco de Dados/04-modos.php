<?php

    require_once("./conexao.php");

    $sql = "SELECT nome FROM alunos";     
    
    // FETCH_BOTH
    $stmt = $conn->query($sql);
    $rows = $stmt->fetchAll();    

    echo "Padrão: PDO::FETCH_BOTH\n";
    var_dump($rows);

    
    $stmt = $conn->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);    

    echo "\n\nPDO::FETCH_ASSOC\n";
    var_dump($rows);


   
    $stmt = $conn->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

    echo "\n\nPDO::FETCH_OBJ\n";
    var_dump($rows);
?>