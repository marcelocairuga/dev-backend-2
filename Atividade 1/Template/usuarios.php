<?php

// retome a sessão
// verifique se há usuário logado (se não, redirecione para login.php)
// verifique se o usário é administrador. 
// -- se não for, exiba uma mensagem de erro e um link para a página inicial
// busque a lista de usuários no banco de dados
// no HTML, gere as linhas <tr>...</tr> para cada usuário
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>MyTasks</title>
</head>
<body>
    <h1>Minhas Tarefas</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Admin</th>
        </tr>

    </table>
    <p><a href="index.php">Página Inicial</a></p>
</body>
</html>
