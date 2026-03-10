<?php
require_once "pdo.php";
require_once 'project_header.php';

session_start();

if (!isset($_SESSION['authorized']) || $_SESSION['authorized'] !== true) {
    
    header('Location: login_form.php');
    exit;
    }
else{

}
?>