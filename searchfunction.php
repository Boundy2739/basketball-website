<?php 
require_once "pdo.php";


function search($items,$minprice,$maxprice){
    global $pdo;
    if(empty($minprice)){
        $minprice = 0;
    }
    if(empty($maxprice)){
        $maxprice = 9999999999;
    }
    if ($minprice > $maxprice){
        $minprice = $maxprice - 1;
    }
    $sql = "SELECT * FROM items WHERE name LIKE :item AND price >= :minprice AND price <= :maxprice";
    $stmt = $pdo->prepare($sql);
    if(empty($items)){
        $stmt->execute(array( 
            ':item' => "%%",
            ':minprice' => $minprice,
            ':maxprice' => $maxprice
    ));

    }
    else{
        $stmt->execute(array( 
            ':item' => "%$items%",
            ':minprice' => $minprice,
            ':maxprice' => $maxprice
    ));}

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>