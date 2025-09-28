<?php
require_once "controller/controller.php";
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari amb PHPMailer</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <form method="POST" action="index.php">
        <label for="subjecte">Subject:</label>
        <input type="text" id="subjecte" name="subjecte" maxlength="50" value="<?= htmlspecialchars($subjecte, ENT_QUOTES, "UTF-8"); ?>">

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= htmlspecialchars($email, ENT_QUOTES, "UTF-8"); ?>">

        <label for="message">Message:</label>
        <textarea id="message" name="message" maxlength="150"><?= htmlspecialchars($missatge, ENT_QUOTES, "UTF-8"); ?></textarea>

        <p><?= $error ?></p>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>