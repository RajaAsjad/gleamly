<?php
declare(strict_types=1);
require_once __DIR__ . '/../includes/config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = trim((string)($_POST['username'] ?? ''));
    $pass = (string)($_POST['password'] ?? '');
    if ($user === ADMIN_USER && password_verify($pass, ADMIN_PASS_HASH)) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: dashboard.php');
        exit;
    }
    $error = 'Invalid username or password.';
}

if (is_admin()) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Login | Gleamly</title>
  <meta name="robots" content="noindex, nofollow">
  <link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">
</head>
<body class="admin-body">
  <div class="admin-shell" style="max-width:420px;margin-top:4rem">
    <div class="admin-card">
      <h1 style="font-size:1.5rem">Gleamly Admin</h1>
      <p class="text-muted">Sign in to manage quote enquiries.</p>
      <?php if ($error): ?><div class="alert alert-err"><?= e($error) ?></div><?php endif; ?>
      <form method="post">
        <div class="field" style="margin-bottom:1rem">
          <label for="username">Username</label>
          <input id="username" name="username" type="text" required autocomplete="username">
        </div>
        <div class="field" style="margin-bottom:1.25rem">
          <label for="password">Password</label>
          <input id="password" name="password" type="password" required autocomplete="current-password">
        </div>
        <button class="btn btn-primary" type="submit">Sign in</button>
      </form>
    </div>
  </div>
</body>
</html>
