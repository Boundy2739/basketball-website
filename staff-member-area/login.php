<?php
require_once "../pdo.php";
require '../functions/finduser.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $typed_email = $_POST['username'];
        $typed_password = $_POST['password'];

        $user = findUser($pdo,$typed_email);
        if ($user && password_verify($typed_password, $user['password'])) {
            $_SESSION['authorised'] = TRUE;

            header('Location: membersarea.php');
            exit;
        } else {
            header('Location: login_form.php');
            exit;
        }
    }
}
