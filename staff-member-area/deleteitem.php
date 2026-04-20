<?php
require_once '../config/config.php';
$_SESSION['last_activity'] = time();
title_bar("Stock",['css/forms.css','css/style.css']);
requireAuthorisation();
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

    <?php require_once '../templates/confirmform.php'; ?>
    <script src="../js/main.js"></script>
    <script>openConfirm("delete_item")</script>
</body>

</html>