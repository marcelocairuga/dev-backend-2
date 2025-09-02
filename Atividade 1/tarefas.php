<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['delete_id'])) {
        $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = :taskId AND userId = :userId");
        $stmt->execute([
            'taskId' => $_POST['delete_id'],
            'userId' => $_SESSION['user_id']
        ]);
    }
}

$stmt = $pdo->prepare("SELECT * FROM tasks WHERE userId = :userId");
$stmt->execute(['userId' => $_SESSION['user_id']]);
$tasks = $stmt->fetchAll();
?>

<h2>Minhas Tarefas</h2>
<table>
    <tr>
        <th>Título</th>
        <th>Ações</th>
    </tr>
<?php foreach ($tasks as $task): ?>
<tr>
    <td><?= $task['title'] ?></td>
    <td>
        <form method="post">
            <input type="hidden" name="delete_id" value="<?= $task['id'] ?>">
            <button type="submit">Excluir</button>
        </form>
    </td>
</tr>
<?php endforeach; ?>
</table>
<p><a href="index.php">Página Inicial</a></p>