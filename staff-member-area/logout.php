<?php
require_once "../pdo.php";
session_start();
$_SESSION = array();
session_destroy();
header('Location: login_form.php');
        exit;
?>