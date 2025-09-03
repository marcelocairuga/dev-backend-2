<?php

// retome a sessão
// verifique se há usuário logado (se não redireciona para login.php)
// no HTML, faça com que o link Usuários do Sistema só exista se o usuário for admin
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
            <li><a href="usuarios.php">Usuários do Sistema</a></li>
            <li><a href="login.php">Sair</a></li>
        </ul>
    </nav>
</body>
</html>
