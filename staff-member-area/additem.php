<?php
session_start();
require_once "../pdo.php";
require '../templates/project_header.php';
require '../templates/project_footer.php';
require '../functions/userauthorisation.php';
require '../functions/validateinputs.php';
require '../functions/validateimage.php';
title_bar("Stock");
requireAuthorisation();
if (isset($_POST['item-name']) && isset($_POST['quantity']) && isset($_POST['price'])) {

    $image = validateImg($pdo,$_FILES['image-name']);
    $sql = "INSERT INTO items (image,name,short_description,long_description,quantity,price) 
    VALUES (:image,:name,:short_desc,:long_desc, :quantity, :price)";
    echo ("<pre>\n" . $sql . "\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':image' => $image,
        ':name' => $_POST['item-name'],
        ':short_desc' => $_POST['short-desc'],
        ':long_desc' => $_POST['long-desc'],
        ':quantity' => $_POST['quantity'],
        ':price' => $_POST['price']
    ));
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/forms.css">
    <title>Document</title>
</head>

<body>
    <p>Add items </p>
    <form method="post" class="item-form" enctype="multipart/form-data">
        <div class="item-form-left">
            <label for="item-name">Item name:</label>
            <input type="text" name="item-name" id="item-name" required>
            <label for="short-desc">Item short description:</label>
            <textarea name="short-desc" id="short-desc"  placeholder="Please add item short decription" required></textarea>
            <label for="long-desc">Item long description:</label>
            <textarea name="long-desc" id="long-desc"  placeholder="Please add item decription" required></textarea>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" required>
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" required>
        </div>
        <div class="item-form-right">
            <label for="item-image">Upload item image:</label>
            <input type="file" name="item-image" value="" id="item-image">
        </div>
        <div class="item-form-bottom">
            <input type="submit" value="Add item" class="confirm-buttons">
        </div>
    </form>
    <section class="page-redirect-buttons">
        <form action="stock.php" method="post">
            <button type="submit" class="confirm-buttons">Go back items list</button>
        </form>
        <form action="membersarea.php" method="post">
            <button type="submit" class="confirm-buttons">Go back to member area</button>
        </form>
    </section>

</body>

</html>