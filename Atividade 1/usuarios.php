<?php
session_start();
require_once 'conexao.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (empty($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    echo "<p>Você não tem permissão para acessar esta página.</p>";
    echo '<p><a href="index.php">Página Inicial</a></p>';
    exit;
}

// Buscar todos os usuários
$stmt = $pdo->query("SELECT id, name, email, is_admin FROM users");
$users = $stmt->fetchAll();
?>

<h2>Usuários</h2>
<table>
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Admin</th>
    </tr>
<?php foreach ($users as $user): ?>
<tr>
    <td><?= $user['name'] ?></td>
    <td><?= $user['email'] ?></td>
    <td><?= $user['is_admin'] ? 'Sim' : 'Não' ?></td>
</tr>
<?php endforeach; ?>
</table>
<p><a href="index.php">Página Inicial</a></p>
