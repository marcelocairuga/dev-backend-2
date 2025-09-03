<?php

// retome a sessão
// verifique se há usuário logado (se não, redirecione para login.php)
// se a requisicao for POST e houver delete_id:
// -- exclua a tarefa com aquele id
// -- para maior segurança, garanta que pertence ao usuário logado
// busque a lista de tarefas no banco de dados
// no HTML, gere as linhas <tr>...</tr> para cada tarefa
// -- não esqueça que o envio da requisicao de exclusao deve ser feito via POST
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
            <th>Título</th>
            <th>Ações</th>
        </tr>

    </table>
    <p><a href="index.php">Página Inicial</a></p>
</body>
</html>
