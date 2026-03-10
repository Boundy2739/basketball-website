<?
require_once 'pdo.php';
function get_item($item){

    $stmt = $pdo->prepare("SELECT * FROM items WHERE id = ?");
    $stmt->execute($item);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

}
?>