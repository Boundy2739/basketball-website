<!doctype html>
<?php require 'project_header.php';
require_once 'pdo.php';
include 'searchfunction.php';
title_bar("Basketballs");
if (empty($_POST['searchfield']) && empty($_POST['minprice']) && empty($_POST['maxprice'])) {
    $stmt = $pdo->query("SELECT id,image, name, quantity, price FROM items");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

} else {
    $rows = search($_POST['searchfield'], $_POST['minprice'], $_POST['maxprice']);
    print_r($_POST['minprice'], $_POST['maxprice']);
    if (empty($_POST['maxprice'])) {
    }
}

?>

<head>
    <link rel="stylesheet" href="css/items.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>
</head>

<body>


    <div class="main-grid">
        <section class="header">
            
            <form method="POST">
                <div class="searchfield-wrap">
                    <input type="text" name="searchfield" id="searchfield" placeholder="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
                <input type="number" name="minprice" id="minprice" style="display: none;">
                <input type="number" name="maxprice" id="maxprice"style="display: none;">
                
            </form>
            <h1>Baskeballs</h1>
        </section>
        
        <section class="side">
            <p>Something something something</p>
        </section>
        <section class="main">
            
            <ul>
            <div class="items-list">
            <?php
                foreach ($rows as $row) {
                echo '<li class="individual-item">';
                echo '<article >';
                echo '<figure>';
                echo '<img src="uploaded_images/' . $row['image'] . '" alt="item" style="width:230px">';
                echo '<figcaption>';
                echo '<p>something something something</p>'  ;                      
                echo '</figcaption>';
                echo '</figure>';
                echo '<div class="item-description">';
                echo (htmlentities($row['name']));
                echo (htmlentities("£" . $row['price']));
                echo'<div><a href="product_template.php?itemid=' . $row['id'] . ' "class="viewbtn">View product</a></div>';
                echo '</div>';
                echo '</article>';
                echo '</li>';
                
                }
                ?>
            </div>
            </ul>
        </section>

    </div>
</body>

</html>