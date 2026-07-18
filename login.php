<?php session_start(); if ($_SESSION['user_session_token']) {
    header('Location:adminpanel.php');
    exit;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="input.css">
</head>
<body>
<form class="GolosPrirody" method="post" action="sessionmanager.php">
    <input type="text" class="input" placeholder="Ваша почта" name="username">
    <input type="password" class="input" placeholder="Ваш пароль" name="password">
    <button type="submit" class="input">Логин</button>
</form>
</body>
</html>