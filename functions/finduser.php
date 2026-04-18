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
        return $user;
    }
    else{
        errorMessage("Wrong email or password","login_form.php");
    }
    
}
