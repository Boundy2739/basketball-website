<?php
require_once "pdo.php";


function search($pdo, $parameters)
{

    $sql = "SELECT * FROM items WHERE name LIKE :item 
    AND price >= :minprice 
    AND price <= :maxprice
    AND brand LIKE :brand ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':item' => '%' . $parameters["item-name"] . '%',
        ':minprice' => $parameters['min-price'],
        ':maxprice' => $parameters['max-price'],
        ':brand' => '%'.$parameters['item-brand'].'%',
    ));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
