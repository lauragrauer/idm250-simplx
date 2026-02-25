<?php
require_once __DIR__ . '/.env.php';
require_once __DIR__ . '/includes/auth.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (login_user($username, $password)) {
        header('Location: index.php');
        exit;
    } else {
        $message = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>CMS - Login</title></head>
<body>
    <h1>CMS Login</h1>

    <?php if ($message): ?>
        <p><b><?= $message ?></b></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <div>
            <label for="username">Username</label><br>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>