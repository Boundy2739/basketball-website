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
        isset($_POST['name']) && isset($_POST['email'])
        && isset($_POST['password'])
    ) {
        $passwordString = $_POST["password"];
        $passwordHash = password_hash($passwordString, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password) 
            VALUES (:name, :email, :password)";
        echo ("<pre>\n" . $sql . "\n</pre>\n");
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':name' => $_POST['name'],
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
        <p>Name:
            <input type="text" name="name" size="40">
        </p>
        <p>Email:
            <input type="text" name="email">
        </p>
        <p>Password:
            <input type="password" name="password">
        </p>
        <p><input type="submit" value="Add New" /></p>
    </form>
    <form action="membersarea.php" method="get">
        <button type="submit">Go back to member area</button>
    </form>
</body>

</html>