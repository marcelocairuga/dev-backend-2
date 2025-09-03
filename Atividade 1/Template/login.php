<?php

// destrua qualquer possível sessão existente
// importe a conexão PDO
// se a requisição for POST, implemente a lógica do login
// -- login bem sucedido: crie a sessão com as informações do usuário e redirecione para index.php
// -- falha no login: exiba uma mensagem de erro abaixo do formulário

?>

<form method="post">
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>