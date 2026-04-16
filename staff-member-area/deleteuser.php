<?php
require_once "../pdo.php";
require '../functions/userauthorisation.php';
require '../templates/project_header.php';
require '../templates/project_footer.php';
require '../functions/finduser.php';
title_bar("users");
session_start();
requireAuthorisation();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $verify = findUserWithPwd($pdo, $_SESSION['email'], $_POST['password']);
    if ($verify) {
        if (isset($_GET['deleteid'])) {
            $user = $_GET['deleteid'];


            $sql = "DELETE FROM users WHERE email= '$user'";
            $stmt = $pdo->query($sql);
            echo "<script>alert('User deleted')</script>";
            echo "<script>document.location = 'membersarea' </script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/forms.css">

</head>

<body>

    <?php require_once '../templates/confirmform.php'; ?>
    <script src="../js/main.js"></script>
    <script>
        openConfirm("delete_user")
    </script>
</body>

</html>