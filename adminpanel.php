<?php
session_start();
if (!isset($_SESSION['user_session_token'])) {
    header('Location:login.php');
    exit;
}
require_once 'databases.php'; 

$stmt = $db->prepare('SELECT * FROM rules LIMIT 1');
$stmt->execute();
$text = $stmt->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="input.css">
</head>
<body>
    <form method="post" class="GolosPrirody" action="update_rules.php">  <textarea class="input" name="rules_text" rows="5" placeholder="Введите текст правил..."><?php echo htmlspecialchars($text); ?></textarea><button class="input" type="submit">Сменить Текст правил</button></form>
</body>
</html>