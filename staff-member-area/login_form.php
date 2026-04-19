<!DOCTYPE html>
<?php  
require_once '../config/config.php';

    title_bar("Login page");
    alreadyAuthorised();
    
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
</head>
<body>
<h1 class="title">Login </h1>

<form method="POST" action="login.php" class="login-form" id="main">
    <?php displayError()?>
    <label for="username">Email</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

    <button type="submit" class="confirm-buttons">Login</button>
</form>
<?php require '../templates/project_footer.php'?>
</body>
</html>
