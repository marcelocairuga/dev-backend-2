<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$isAdmin = $_SESSION['is_admin'] ?? 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>MyTasks</title>
</head>
<body>
    <h1>MyTasks - Gerenciador de Tarefas</h1>
    <p>Escolha uma opção:</p>
    <nav>
        <ul>
            <li><a href="tarefas.php">Minhas Tarefas</a></li>
            <?php if ($isAdmin): ?>
                <li><a href="usuarios.php">Usuários do Sistema</a></li>
            <?php endif; ?>
            <li><a href="login.php">Sair</a></li>
        </ul>
    </nav>
</body>
</html>
