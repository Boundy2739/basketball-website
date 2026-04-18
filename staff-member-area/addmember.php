<?php
session_start();
require_once "../pdo.php";
require '../templates/project_header.php';
require '../functions/userauthorisation.php';
require '../functions/validateinputs.php';
title_bar("Members area");

requireAuthorisation();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['fname']) && isset($_POST['email'])
        && isset($_POST['password'])
    ) {
        $_SESSION['retrun_page'] = '../staff-member-area/addmember.php';
        $fname = validate_names($_POST['fname']);
        $passwordString = validate_passwords($_POST['password']);
        $email = validate_email($_POST['email']);
        if ($fname && $passwordString && $email) {
            $passwordHash = password_hash($passwordString, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (name, email, password) 
            VALUES (:name, :email, :password)";
            echo ("<pre>\n" . $sql . "\n</pre>\n");
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':name' => $fname,
                ':email' => $email,
                ':password' => $passwordHash
            ));
        }

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
    <?php displayError()?>
        <label for="fname">Name:</label>
        <input type="text" name="fname" id="fname">
        <label for="lname">Surname:</label>
        <input type="text" name="lname" id="lname">
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