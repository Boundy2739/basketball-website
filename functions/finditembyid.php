<?php 
function findItemByID($pdo, $itemId)
{
    $sql = "SELECT * FROM items WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $itemId,
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}