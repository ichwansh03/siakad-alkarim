<?php
ob_start();
session_start();
require "php/config.php";
require_once "php/functions.php";
$user = new login_registration_class();
$user->teach_logout();
header('Location: loginguru.php');
exit();
ob_end_flush();
?>
