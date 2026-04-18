<?php
require "pdo.php";
if(isset($_POST['reviewer'])){
    $user = $_POST['reviewer'];
    $rating = $_POST['star_radio'];
    $review = $_POST['reviewtext'];
    $item = $_POST['itemID'];

    $sql = "INSERT INTO item_reviews (itemID,user_name, review, rating) 
                VALUES (:itemID,:user_name,:review,:rating)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        'itemID'=>$item,
        'user_name'=>$user,
        'review'=>$review,
        'rating'=>$rating
    ));
    print_r($item);
}
?>
