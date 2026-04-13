<?php

function title_bar($title)
{
    if (!$title) {
        $title = "My Great Site!";
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title><?= $title; ?></title>
        <link rel="stylesheet" href="/basketballwebsite/css/horizontal.css">
        <link rel="stylesheet" href="/basketballwebsite/css/footer.css">
    </head>

    <body>
        <nav>
            <div class="logo-wrap">
                <a href="/index.php" class="logo">
                    <img src="/basketballwebsite/logo/01a9431c-1698-4922-913a-42ed3a706026.png">
                </a>
            </div>

            <a href="/basketballwebsite/aboutus.php">About us</a>
            <a href="/basketballwebsite/items.php">Basketballs</a>
            <a href="/basketballwebsite/contact.php">Contact</a>
            <a href="/basketballwebsite/review.php">Customer reviews</a>
            <a href="/basketballwebsite/staff-member-area/login_form.php">Staff area</a>
            <a href="/basketballwebsite/cart.php">Cart <i class="fa fa-shopping-cart"></i></a>
        </nav>

    <?php
}

    ?>