<!DOCTYPE html>
<?php  
require '../templates/project_header.php';
require '../functions/userauthorisation.php';
require '../functions/errormessages.php';

    title_bar("");
    session_start();
    alreadyAuthorised();
    
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
    <title>Form</title>
</head>
<body>
<h2>Login</h2>

<form method="POST" action="login.php" class="login-form">
    <?php displayError()?>
    <label>Email</label>
    <input type="text" name="username" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit" class="confirm-buttons">Login</button>
</form>
<?php require '../templates/project_footer.php'?>
</body>
</html>
