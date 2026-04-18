<?php
require_once "../functions/pdo.php";
session_start();
$_SESSION = array();
session_destroy();
header('Location: login_form.php');
        exit;
?>