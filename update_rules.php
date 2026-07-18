<?php 
session_start();
if (!isset($_SESSION['user_session_token'])) {
    header('Location:login.php');
    exit;
}
require_once 'databases.php'; 

if (!empty($_POST['rules_text'])) {
$stmt = $db->prepare('UPDATE rules SET rules_text = :rules_text');
$stmt->execute([':rules_text' => $_POST['rules_text']]);
header('Location:adminpanel.php');
exit; }
else {
    header('Location:adminpanel.php'); 
    exit; }
?>