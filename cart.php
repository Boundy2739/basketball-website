<?php
require './templates/project_header.php';
title_bar("Cart");
$total = array();

if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $i) {
        $total[] = $i['totalprice'];
    }

    $total = array_sum($total);

    print_r($_SESSION['cart']); 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cart.css">
    <title></title>
</head>
<body>
    <div class="container">
        <table border="1">
        <tr>
            <th>Image</th>
            <th>Product</th>
            <th>Quantity</th>
            <th  colspan="4">Subtotal</th>
        </tr>
            <?php
            if(!empty($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $item){
                    echo'<tr><td>';
                    echo'<img src="uploaded_images/' . $item['image'] . '" alt="item" style="width:90px">';
                    echo"</td><td>";
                    echo(htmlentities($item['product']));
                    echo"</td><td>";
                    echo(htmlentities($item['quantity']));
                    echo"</td><td>";
                    echo'<form method="post" action="updatecart.php">';
                    echo'<label for="'.$item['product'].'">Change quantity</label>';
                    echo'<input type="number" name="quantity"">';
                    echo'<input type="hidden" name="product-id" value="'.$item['id'].'">';
                    echo'<input type="submit" value="confirm change"></form>';
                    echo"</td><td>";
                    echo(htmlentities("£ ".number_format($item['totalprice'],2)));
                    echo"</td><td>";
                    echo '<a href="removeitemcart.php?itemid=' . $item['id'] . '">Remove item from cart</a>';
                    echo"</td></tr>";
                }
            } 
            
            ?>
        <?php
        if(!empty($_SESSION['cart'])){
            echo '<tr class="total-row">';
            echo '<td>Subtotal</td>';
            echo'<td>£ '.$total.'</td>';
            echo'</tr>';
            }
            ?>

        
        </table>

    </div>
</body>
</html>