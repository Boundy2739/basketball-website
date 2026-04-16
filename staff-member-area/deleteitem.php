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
            }
            echo "<script>alert('Item deleted " . $item['name'] . "')</script>";
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

    <?php require_once '../templates/confirmform.php'; ?>
    <script src="../js/main.js"></script>
    <script>openConfirm("delete_item")</script>
</body>

</html>