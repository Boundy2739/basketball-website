<?php
require_once '../config/config.php';
if (isset($_SESSION['retrun_page'])) {
    unset($_SESSION['retrun_page']);
}
$_SESSION['last_activity'] = time();
title_bar("Stock");
requireAuthorisation();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['item-name']) && isset($_POST['quantity']) && isset($_POST['price'])) {
        saveFormData();
        print_r($_SESSION['form_data']);
        $_SESSION['retrun_page'] = '../staff-member-area/additem.php';
        $itemname = nameLength($_POST['item-name']);
        $altname = nameLength($_POST['alt-name']);
        $brand = nameLength($_POST['brand']);
        $description = descriptionLength($_POST['long-desc']);
        $image = validateImg($pdo, $_FILES['item-image']);
        $quantity = validate_integers($_POST['quantity']);
        $price = validate_floats($_POST['price']);

        $sql = "INSERT INTO items (image,name,alt_name,brand,surface,long_description,quantity,price) 
        VALUES (:image,:name,:alt_name,:brand,:surface,:long_desc, :quantity, :price)";
        print_r($_SESSION['form_data']);
        echo ("<pre>\n" . $sql . "\n</pre>\n");
        print_r($_SESSION['form_data']);
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':image' => $image,
            ':name' => $itemname,
            ':brand' => $brand,
            ':surface' => $_POST['surface'],
            ':long_desc' => $description,
            ':quantity' => $quantity,
            ':price' => $price
        ));
        deleteFormData();
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>

<body>
    <h1 class="title">Add items </h1>
    <form method="post" class="item-form" enctype="multipart/form-data" id="main">
        <div class="error"><?php displayError(); ?></div>
        <div class="item-form-left">
            <label for="item-name">Item name:</label>
            <input type="text" name="item-name" id="item-name" required value="<?php echo htmlspecialchars(restoreFormData('item-name', ''), ENT_QUOTES, 'UTF-8') ?>">
            <label for="alt-name">Item name:</label>
            <input type="text" name="alt-name" id="alt-name" required value="<?php echo htmlspecialchars(restoreFormData('alt-name', ''), ENT_QUOTES, 'UTF-8') ?>">
            <label for="brand">Brand:</label>
            <input name="brand" id="brand" required placeholder="Brand name" value="<?php echo htmlspecialchars(restoreFormData('brand', ''), ENT_QUOTES, 'UTF-8') ?>">
            <label for="surface">Surface type:</label>
            <select name="surface" id="surface" required>
                <option value="">select type</option>
                <option value="indoor">indoor</option>
                <option value="outdoor">outdoor</option>
                <option value="both">both</option>
            </select>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" required value="<?php echo htmlspecialchars(restoreFormData('quantity', ''), ENT_QUOTES, 'UTF-8') ?>">
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" step="0.01" required value="<?php echo htmlspecialchars(restoreFormData('price', ''), ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div class="item-form-right">
            <label for="item-image">Upload item image:</label>
            <input type="file" name="item-image" value="" id="item-image">
        </div>
        <div class="item-form-bottom">
            <label for="long-desc">Item long description:</label>
            <textarea name="long-desc" id="long-desc" placeholder="Please add item decription" required><?php echo htmlspecialchars(restoreFormData('long-desc', ''), ENT_QUOTES, 'UTF-8') ?></textarea>
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