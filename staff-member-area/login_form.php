<!DOCTYPE html>
<?php  require '../project_header.php';
    title_bar("")?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Form</title>
</head>
<body>
<h2>Login</h2>

<form method="POST" action="login.php" class="login-form">
    <label>Email</label>
    <input type="text" name="username" required>

    <label>Password</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>
</body>
</html>
