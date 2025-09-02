<?php
session_start();
$_SESSION = [];
session_destroy();

require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['is_admin'] = $user['is_admin'];
        header("Location: index.php");
        exit;
    } else {
        $erro = "Email e/ou senha incorretos.";
    }
}
?>

<form method="post">
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>

<?php if (!empty($erro)) echo "<p>$erro</p>"; ?>