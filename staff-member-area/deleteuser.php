<?php
require_once '../config/config.php';
$_SESSION['last_activity'] = time();
title_bar("users",['css/forms.css','css/style.css']);
requireAuthorisation();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $verify = findUserWithPwd($pdo, $_SESSION['email'], $_POST['password']);
    if ($verify) {
        if (isset($_GET['deleteid'])) {
            $stmt=$pdo->prepare("SELECT * from users where email =:email");
            $stmt->execute([":email"=>$_GET['deleteid']]);
            $user =  $stmt->fetch(PDO::FETCH_ASSOC);
            if($user){
                $stmt = $pdo->prepare("DELETE FROM users WHERE email=:email");
                $stmt->execute([":email"=>$user['email']]);
                echo "<script>alert('User deleted: " . $user['name'] .' '.$user['surname']. "')</script>";
                echo "<script>document.location = 'membersarea.php' </script>";
            }
            echo "<script>alert('This user does not exist ')</script>";
            echo "<script>document.location = 'membersarea.php' </script>";
            
        }
    }
}

?>

    <?php require_once '../templates/confirmform.php'; ?>
    <script src="../js/main.js"></script>
    <script>
        openConfirm("delete_user")
    </script>
</body>

</html>