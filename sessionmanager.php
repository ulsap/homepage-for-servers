<?php
session_start();
require_once 'databases.php'; 
$stmt = $db->prepare("SELECT * FROM Users Where username = :username");

$stmt->execute([
    ':username' => $_POST['username']
]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!empty($_POST['username']) && !empty($_POST['password'])) {
if ($user && password_verify($_POST['password'], $user['password'])){
    session_regenerate_id(true);
    $_SESSION['user_session_token'] = $user['ID'];
    header('Location:adminpanel.php');
    exit;

} else {
    header('Location:login.html');
    exit;
}
} else {
    header('Location:login.html');
    exit; }
?>