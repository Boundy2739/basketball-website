<?php require './templates/project_header.php';

require './functions/pdo.php';
title_bar("Item");
$_SESSION['cart'] = array();
if (!isset($_GET['itemid'])) {
    die("Item not found");
} else {
    $stmt = $pdo->prepare("SELECT * FROM items where id = ?");
    $stmt->execute([$_GET['itemid']]);
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
}
if (!empty($_POST['quantity'])) {

    $_SESSION['cart'][$rows['id']] = array(
        'id' => $rows['id'],
        'product' => $rows['name'],
        'quantity' => $_POST['quantity'],
        'singleprice' => (float)$rows['price'],
        'totalprice' => (int)$_POST['quantity'] * (float)$rows['price'],
        'image' => $rows['image'],
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
    <link rel="stylesheet" href="./css/product_template.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <section class="product-image">
            <figure>
                <?php
                echo '<img src="uploaded_images/' . $rows['image'] . '" alt="ball image">';
                ?>
            </figure>
        </section>
        <section class="product-details">
            <?php
            echo '<div class="item-name">';
            echo '<h1>';
            echo (htmlentities($rows['name']));
            echo '</h1>';
            echo '<p class="item-brand">';
            echo (htmlentities($rows['brand']));
            echo '</p>';
            echo '</div>';
            echo '<section class="price-section">';
            echo '<p class="price-paragraph">Price: <span class="price">';
            echo (htmlentities('£'.$rows['price']));
            echo '</span></p>';
            
            ?>

            <div class="rating" aria-label="Rated 4.5 out of 5">
                <span class="star full">★</span>
                <span class="star full">★</span>
                <span class="star full">★</span>
                <span class="star half">★</span>
                <span class="star empty">★</span>
            </div>
            </section>
            <div class="options">
                <form method="post">
                    <div class="buttons-wrap">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity">
                        <input type="submit" id="cartbtn" value="add to cart">
                    </div>
                </form>

            </div>
        </section>
        <section class="product-description">

            <button class="collapsible">
                <h2>Description</h2>
            </button>
            <article class="description">
                <p><?php echo htmlentities($rows['long_description'])?></p>
            </article>

        </section>
        <section class="product-informations">
            <button class="collapsible">
                <h2>More details</h2>
            </button>
            <article class="extra-details">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quos magni accusantium, delectus culpa possimus error cum harum odio blanditiis porro quaerat eveniet molestias unde mollitia, ullam itaque doloremque facilis?</p>
            </article>
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
        if (test.checked) {
            console.log()
        }
    </script>
</body>

</html>