<?php
require_once "../pdo.php";
requireAuthorisation();
if(isset($_GET["itemid"])){
    
    $sql = "DELETE from items WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['itemid']]);
    
    echo 'something,something,something';
    $stmt = $pdo->prepare("SELECT image FROM items WHERE id = ?");
    $stmt->execute([$_GET['itemid']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<script>alert('Item deleted')</script>";
    echo "<script>document.location = 'stock' </script>";
    if ($row && !empty($row['image'])) {
        $filePath = 'uploaded_images/' . $row['image'];

        
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    
    }
    else{
        echo "<script>alert('Item deleted')</script>";
    echo "<script>document.location = 'stock' </script>";
    }
    echo "<script>alert('Item deleted')</script>";
    echo "<script>document.location = 'stock' </script>";
}

?>