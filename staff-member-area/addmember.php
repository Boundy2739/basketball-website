<?php
session_start();
require_once "../pdo.php";
require '../project_header.php';
title_bar("Members area");

if (!isset($_SESSION['authorized']) || $_SESSION['authorized'] !== true) {

    header('Location: login_form.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['fname']) && isset($_POST['email'])
        && isset($_POST['password'])
    ) {
        $passwordString = $_POST["password"];
        $passwordHash = password_hash($passwordString, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password) 
            VALUES (:name, :email, :password)";
        echo ("<pre>\n" . $sql . "\n</pre>\n");
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':name' => $_POST['fname'],
            ':email' => $_POST['email'],
            ':password' => $passwordHash
        ));
        header('Location: membersarea.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <p>Add A New User</p>
    <form method="post" class="login-form">
        <label for="fname">Name:</label>
        <input type="text" name="fname" id="fname" size="40">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <label for="password">Password:</label>
        <input type="password" name="password">
        <input type="submit" value="Add New" class="confirm-buttons">
    </form>
    <form action="membersarea.php" method="post" class="page-redirect-buttons">
        <button type="submit" class="confirm-buttons">Go back to member area</button>
    </form>
</body>

</html>