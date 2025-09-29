<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial dels correus amb PHPMailer</title>
    <link rel="stylesheet" href="style/history.css">
</head>
<body>
    <table>
        <tr>
            <th>Remitent</th>
            <th>Destinatari</th>
            <th>Assumpte</th>
            <th>Missatge</th>
        </tr>
        <?php for ($i = 0; $i < count($history); $i++): ?>
            <tr>
                <td><?= htmlspecialchars($history[$i]['sender'], ENT_QUOTES, "UTF-8"); ?></td>
                <td><?= htmlspecialchars($history[$i]['recipient'], ENT_QUOTES, "UTF-8"); ?></td>
                <td><?= htmlspecialchars($history[$i]['subject'], ENT_QUOTES, "UTF-8"); ?></td>
                <td><?= htmlspecialchars($history[$i]['body'], ENT_QUOTES, "UTF-8"); ?></td>
            </tr>
        <?php endfor; ?>
    </table>
    <form method="POST" action="index.php">
        <button type="submit" name="history_close">Close History</button>
    </form>
</body>
</html>