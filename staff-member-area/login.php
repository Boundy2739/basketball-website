<?php
require_once "../pdo.php";
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $typed_email = $_POST['username'];
    $typed_password = $_POST['password'];

    // SAFE VERSION: use prepared statements
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $typed_email,
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($typed_password,$user['password'])) {
        $_SESSION['authorized'] = TRUE;
        
        header('Location: membersarea.php');
        exit;
    } else {
        echo "<p>authorised</p>";
        header('Location: login_form.php');
        exit;
    }
}?>
