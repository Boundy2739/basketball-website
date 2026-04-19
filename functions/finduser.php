<?php
require_once "errormessages.php"; 
function findUserWithPwd($pdo, $email,$password)
{
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $email,
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user && password_verify($password, $user['password'])){
        reset_attempts($_SERVER['REMOTE_ADDR'], $pdo);
        return $user;
    }
    else{
        rate_limiter($_SERVER['REMOTE_ADDR'], 5, $pdo);
        errorMessage("Wrong email or password","login_form.php");
    }
    
}
