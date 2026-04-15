<?php
session_start();
require_once "../pdo.php";
require '../functions/userauthorisation.php';
require'../functions/finditembyid.php';
requireAuthorisation();
if(isset($_GET["itemid"])){
    $item = findItemByID($pdo,$_GET['itemid']);
    $sql = "DELETE from items WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$item['id']]);
    $sql = "DELETE FROM images WHERE filename =:filename";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":filename"=>$item['image']]);
    if ($item['image'] && !empty($item['image'])) {
        $filePath = "../uploaded_images/" . $item['image'];

        
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    
    }
    else{
        echo "<script>alert('Item deleted')</script>";
    echo "<script>document.location = 'stock' </script>";
    }
    echo "<script>alert('Item deleted ".$item['image']."')</script>";
    echo "<script>document.location = 'stock' </script>";
}

?>