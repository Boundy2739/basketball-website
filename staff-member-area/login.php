<?php
require_once "../pdo.php";
require '../functions/finduser.php';

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $typed_email = $_POST['username'];
        $typed_password = $_POST['password'];

        $user = findUserWithPwd($pdo,$typed_email,$typed_password);
        if ($user) {
            $_SESSION['email'] = $typed_email;
            $_SESSION['authorised'] = TRUE;

            header('Location: membersarea.php');
            exit;
        }
    }
}
