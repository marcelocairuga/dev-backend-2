<?php 


$servername = "localhost";
$username = "root";
$password = "";
$schema = "aula"; //nome do banco

try {
    $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);

    // muda a configuração de erro do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão realizada com sucesso! \n";

} catch(PDOException $err) {
    echo "Connection failed: " . $err->getMessage();
}
