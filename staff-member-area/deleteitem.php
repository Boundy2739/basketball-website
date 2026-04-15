<?php
session_start();
require_once "../pdo.php";
require '../templates/project_header.php';
require '../templates/project_footer.php';
require '../functions/userauthorisation.php';
require '../functions/finditembyid.php';
require '../functions/validateimage.php';
require '../functions/finduser.php';
title_bar("Stock");
print_r($_SESSION);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $verify = findUserWithPwd($pdo, $_SESSION['email'], $_POST['password']);
    if ($verify) {
        if (isset($_GET["itemid"])) {
            $item = findItemByID($pdo, $_GET['itemid']);
            $sql = "DELETE from items WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$item['id']]);
            $sql = "DELETE FROM images WHERE filename =:filename";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([":filename" => $item['image']]);
            if ($item['image'] && !empty($item['image'])) {
                $filePath = "../uploaded_images/" . $item['image'];


                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            } else {
                echo "<script>alert('Item deleted')</script>";
                echo "<script>document.location = 'stock' </script>";
            }
            echo "<script>alert('Item deleted " . $item['image'] . "')</script>";
            echo "<script>document.location = 'stock' </script>";
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
    <form method="POST" action="" class="login-form">
        <h2>Are you sure you want to delete the item?</h2>
        <div class="last-confirmation-buttons">
            <button type="button" class="btn-cancel">No</button>
            <button type="button" class="btn-continue">Yes</button>
        </div>
        <div class="hidden-pwd-box">
            <label for="pwd-confirm-input">Password:</label>
            <input type="password" name="password" id="pwd-confirm-input" required placeholder="please enter the password">
            <button type="submit" class="confirm-buttons">Confirm Delete</button>
            <button type="button" class="btn-cancel">Cancel</button>
        </div>

    </form>
    <script src="../js/main.js"></script>
</body>

</html>