<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $passwordString = $_POST["password"];
    $passwordHash = password_hash($passwordString, PASSWORD_DEFAULT);
    echo $passwordHash;
    //Find out how to compare a hashed password.. use google

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="password">
        <button>Submit</button>
    </form>
</body>
</html>