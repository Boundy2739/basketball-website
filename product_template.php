<?php require 'project_header.php';
require 'pdo.php';
title_bar("Item");
$_SESSION['cart'] = array();
session_start();
if(!isset($_GET['itemid'])){
    die("Item not found");
}
else{
    $stmt = $pdo->prepare("SELECT * FROM items where id = ?");
    $stmt->execute([$_GET['itemid']]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
if(!empty($_POST['quantity'])){
    
        $_SESSION['cart'][$rows[0]['id']] = array(
        'id' => $rows[0]['id'],
        'product' => $rows[0]['name'],
        'quantity' => $_POST['quantity'],
        'singleprice' => (float)$rows[0]['price'],
        'totalprice' => (int)$_POST['quantity'] * (float)$rows[0]['price'],
        'image' => $rows[0]['image'],
    );
    print_r(count($_SESSION['cart']));
    print_r($_SESSION['cart']);
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/product_template.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <section class="product-image"> <figure>
            <?php
            echo '<img src="uploaded_images/' . $rows[0]['image'] .'" alt="ball">';
            ?>
        </figure></section>
        <section class="product-details">
            <?php
            echo'<h1>';
            echo (htmlentities($rows[0]['name']));
            echo '</h1>';
            echo '<p>Price: <span class="price">';
            echo(htmlentities($rows[0]['price']));
            echo'</span></p>'; 
            ?>
            
            <div class="rating" aria-label="Rated 4.5 out of 5">
                <span class="star full">★</span>
                <span class="star full">★</span>
                <span class="star full">★</span>
                <span class="star half">★</span>
                <span class="star empty">★</span>
            </div>
            <div class="options">
                <form method="post">
                    <div class="quantity-wrap">
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity">
                    </div>
                    <div class="buttons-wrap">
                        <button type="submit" id="cartbtn">add to cart <i class="fa fa-shopping-cart"></i></button>
                        <button class="wishlist-btn">Add to wishlist <i class="fa fa-star"></i></button>
                        
                    
                    </div>
                </form>
                <form method="post" action="additemreview.php">
                    <button class="collapsible" id="reviewbtn">Write review <i class="fa fa-shopping-cart"></i></button>
                    <div class="review-wrap">
                    <label for="reviewer"></label>
                    <input type="text" id="reviewer" name="reviewer" placeholder="Type your name" required>
                    <div class="star-wrap">
                        <label for="st-1">★</label>
                        <label for="st-2">★</label>
                        <label for="st-3">★</label>
                        <label for="st-4">★</label>
                        <label for="st-5">★</label>
                        <input type="radio" id="st-1" value="1" name="star_radio" required/>
                        <input type="radio" id="st-2" value="2" name="star_radio"/>
                        <input type="radio" id="st-3" value="3" name="star_radio"/>   
                        <input type="radio" id="st-4" value="4" name="star_radio"/>
                        <input type="radio" id="st-5" value="5" name="star_radio"/>
                    </div>
                    <label for="reviewtext"></label>
                    <textarea name="reviewtext" id="reviewtext"></textarea>
                    <?php 
                    echo '<input type="hidden" name="itemID" value="'.$rows[0]['id'].'">'
                    ?>
                    
                    <button type="submit" id="reviewsubmit">send review</button>
                    </div>
                </form>
            </div>
        </section>
        <section class="product-description">
            
                <button class="collapsible"><h2>Description</h2></button>
                <article class="description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quos magni accusantium, delectus culpa possimus error cum harum odio blanditiis porro quaerat eveniet molestias unde mollitia, ullam itaque doloremque facilis?</p>
                </article>
            
        </section>
        <section class="product-informations">
            <button class="collapsible"><h2>More details</h2></button>
            <ul class="extra-details">
                <li>Someting</li>
                <li>Someone</li>
                <li>Somewhere</li>
                <li>Somehow</li>
            </ul>
        </section>
        <section class="product-reviews"></section>
        <section></section>
    </div>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
            content.style.display = "none";
            } else {
            content.style.display = "block";
            
            
            
            }
        });
        }
        let test = document.getElementById("st-5");
        if(test.checked){
            console.log("hiiiiiiiiii")
        }
        
</script>
</body>
</html>