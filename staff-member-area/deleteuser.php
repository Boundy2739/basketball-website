<?php
require_once "../pdo.php";
require '../functions/userauthorisation.php';
session_start();
requireAuthorisation();
if (isset($_GET['deleteid'])){
    $user = $_GET['deleteid'];
    
    
    $sql = "DELETE FROM users WHERE email= '$user'";
    $stmt = $pdo->query($sql);
    echo "<script>alert('User deleted')</script>";
    echo "<script>document.location = 'membersarea' </script>";
}

