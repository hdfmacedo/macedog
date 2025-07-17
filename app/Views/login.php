<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { background: #121212; color: #fff; font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; }
        form { background: #1e1e1e; padding: 20px; border-radius: 5px; }
        input { display: block; width: 100%; padding: 10px; margin-bottom: 10px; background: #333; color: #fff; border: none; }
        button { padding: 10px; background: #0069d9; border: none; color: #fff; cursor: pointer; width: 100%; }
    </style>
</head>
<body>
    <form method="POST" action="/login">
        <h2>Login</h2>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
