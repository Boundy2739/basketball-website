<?php

function title_bar($title) {
    if (!$title) {
        $title = "My Great Site!";
    }
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title><?= $title; ?></title>
            <link rel="stylesheet" href="css/horizontal.css">
            <link rel="stylesheet" href="css/footer.css">
        </head>
        <body>
            <nav>
                <div class="logo-wrap">
                <a href="indexx.php" class="logo"><img src="logo/01a9431c-1698-4922-913a-42ed3a706026.png" ></a>
                </div>
                
                <a href="aboutus.php">About us</a>
                <a href="items.php">Basketballs</a>
                <a href="contact.php">Contact</a>
                <a href="login_form.php">Member Login</a>
                <a href="review.php">Customer reviews</a>
                <a href="cart.php">Cart <i class="fa fa-shopping-cart"></i></a>
            </nav>

<?php
  }
  
?>

