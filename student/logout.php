<?php
ob_start();
session_start();
require "../main/config.php";
require_once "connect.php";
$user = new LoginAndRegStudent();
$user->studentLogout();
header('Location: index.php');
exit();
ob_end_flush();
?>
