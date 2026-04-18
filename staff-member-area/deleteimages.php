<?php
require_once "../functions/pdo.php";
require '../functions/userauthorisation.php';
requireAuthorisation();
if (isset($_GET['imageid'])){
    $id = (int) $_GET['imageid'];

    
    $stmt = $pdo->prepare("SELECT image FROM items WHERE id = ?");
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && !empty($row['image'])) {
        $filePath = 'uploaded_images/' . $row['image'];

        
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $stmt = $pdo->prepare("UPDATE items SET image = NULL WHERE id = ?");
        $stmt->execute([$id]);
        echo "<script>alert('image deleted')</script>";
        echo "<script>document.location = 'stock' </script>";
}}
