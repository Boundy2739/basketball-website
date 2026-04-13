<?php 
function findUser($pdo, $typed_email)
{
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $typed_email,
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}