<?php

require 'conexao.php';

$users = [
    ["Admnistrador do Sistema", "admin@email.com", password_hash("admin123", PASSWORD_DEFAULT), 1],
    ["Alvirinha Souza", "alvirinha@email.com", password_hash("alvirinha", PASSWORD_DEFAULT), 0],
    ["Elesbão Silva", "elesbao@email.com", password_hash("elesbao", PASSWORD_DEFAULT), 0],
    ["Dorotéia Virsh", "doroteia@email.com", password_hash("doroteia", PASSWORD_DEFAULT), 0],
    ["Genoveva da Rocha", "genoveva@email.com", password_hash("genoveva", PASSWORD_DEFAULT), 0],
    ["Bernardino Costa", "bernardino@email.com", password_hash("bernardino", PASSWORD_DEFAULT), 0],
];

$tasks = [
    ['title' => 'Implementar autenticação JWT', 'is_urgent' => 1, 'is_completed' => 0, 'userId' => 2],
    ['title' => 'Revisar documentação do sistema', 'is_urgent' => 0, 'is_completed' => 1, 'userId' => 2],
    ['title' => 'Criar testes unitários', 'is_urgent' => 1, 'is_completed' => 0, 'userId' => 2],
    ['title' => 'Configurar banco de dados', 'is_urgent' => 0, 'is_completed' => 0, 'userId' => 3],
    ['title' => 'Otimizar consultas SQL', 'is_urgent' => 1, 'is_completed' => 1, 'userId' => 3],
    ['title' => 'Desenvolver tela de login', 'is_urgent' => 1, 'is_completed' => 0, 'userId' => 4],
    ['title' => 'Ajustar layout responsivo', 'is_urgent' => 0, 'is_completed' => 1, 'userId' => 4],
    ['title' => 'Corrigir bug no formulário', 'is_urgent' => 1, 'is_completed' => 0, 'userId' => 4],
    ['title' => 'Implementar cache com Redis', 'is_urgent' => 1, 'is_completed' => 0, 'userId' => 5],
    ['title' => 'Atualizar dependências do projeto', 'is_urgent' => 0, 'is_completed' => 0, 'userId' => 5],
    ['title' => 'Gerar relatório mensal', 'is_urgent' => 0, 'is_completed' => 1, 'userId' => 5],
    ['title' => 'Criar API de tarefas', 'is_urgent' => 1, 'is_completed' => 0, 'userId' => 6],
    ['title' => 'Testar integração com frontend', 'is_urgent' => 0, 'is_completed' => 1, 'userId' => 6]
];


try {
    $pdo->exec("DROP TABLE IF EXISTS tasks");
    $pdo->exec("DROP TABLE IF EXISTS users");
    $pdo->exec("
        CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            is_admin TINYINT(1) DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB
    ");
    $pdo->exec("
        CREATE TABLE tasks (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(100) NOT NULL,
            is_urgent TINYINT(1) DEFAULT 0,
            is_completed TINYINT(1) DEFAULT 0,
            userId INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE
        ) ENGINE=InnoDB
    ");

    $pdo->beginTransaction();

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, is_admin) VALUES (?, ?, ?, ?)");
    foreach ($users as $user) {
        $stmt->execute($user); 
    }

    $stmt = $pdo->prepare("INSERT INTO tasks (title, is_urgent, is_completed, userId) 
                        VALUES (:title, :is_urgent, :is_completed, :userId)");
    foreach ($tasks as $task) {
        $stmt->execute($task); 
    }
    $pdo->commit();
    echo "<p>Banco de dados preparado com sucesso!</p>";
} catch(PDOException $err) {
    echo "Erro ao preparar o banco de dados: " . $err->getMessage();
}
