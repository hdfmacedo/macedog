<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body { background: #121212; color: #fff; font-family: Arial, sans-serif; padding: 20px; }
        a.button { display: inline-block; margin-right: 10px; padding: 10px 15px; background: #0069d9; color: #fff; text-decoration: none; border-radius: 4px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        .late { color: #ff6b6b; }
    </style>
</head>
<body>
    <h1>Dashboard</h1>
    <div>
        <a class="button" href="#">Nova Tarefa</a>
        <a class="button" href="#">Novo Link</a>
        <a class="button" href="#">Nova Anotação</a>
        <a class="button" href="/logout" style="background:#dc3545;">Sair</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Vencimento</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <?php $late = strtotime($task['vencimento']) < time(); ?>
            <tr>
                <td><?= htmlspecialchars($task['titulo']) ?></td>
                <td><?= htmlspecialchars($task['vencimento']) ?></td>
                <td class="<?= $late ? 'late' : '' ?>"><?= htmlspecialchars($task['status']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
