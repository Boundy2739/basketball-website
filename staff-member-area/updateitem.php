<?php
session_start();
require_once "../pdo.php";
require '../templates/project_header.php';
require '../templates/project_footer.php';
require '../functions/userauthorisation.php';
require '../functions/validateimage.php';
require '../functions/imageupdate.php';
require '../functions/renderimage.php';
title_bar("Update stock");
requireAuthorisation();
if (isset($_GET['itemid'])) {
    $sql = "SELECT * from items  where id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':id' => $_GET['itemid']
    ));
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['newname'])) {
        $sql = "UPDATE items
                set name =:name
                WHERE id =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':id' => $_GET['itemid'],
            ':name' => $_POST['newname']

        ));
    }
    if (!empty($_POST['newprice'])) {
        $sql = "UPDATE items
                set price =:price
                WHERE id =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':id' => $_GET['itemid'],
            ':price' => $_POST['newprice']

        ));
    }
    if (!empty($_POST['new-short-desc'])) {
        $sql = "UPDATE items
            set short_description =:short_desc
            WHERE id =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':id' => $_GET['itemid'],
            ':short_desc' => $_POST['new-short-desc']

        ));
    }
    if (!empty($_POST['new-long-desc'])) {
        $sql = "UPDATE items
            set long_description =:long_desc
            WHERE id =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':id' => $_GET['itemid'],
            ':long_desc' => $_POST['new-long-desc']

        ));
    }
    if (!empty($_FILES['new-image']['name'])) {
        $result = update_img($pdo, $_POST['old-image'], $_FILES['new-image'], $item);
        echo $result;
    }
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
            <label for="itemname">Item name:</label>
            <input type="text" name="new-name" id="new-name" value="<?php echo htmlentities($item['name']) ?>">
            <label for="new-short-desc">Short description:</label>
            <textarea name="new-short-desc" id="new-short-desc" value="<?php echo htmlentities($item['short_description']) ?>"></textarea>
            <label for="new-long-desc">Long description:</label>
            <textarea name="new-long-desc" id="new-long-desc" value="<?php echo htmlentities($item['long_description']) ?>"></textarea>
            <label for="quantity">Quantity:</label>
            <input type="number" name="new-quantity" id="new-quantity" value="<?php echo htmlentities($item['quantity']) ?>">
            <label for="price">Price:</label>
            <input type="number" name="new-price" id="new-price" value="<?php echo htmlentities($item['price']) ?>">
        </div>
        <div class="item-form-right">
            <label for="item-image">Upload item image:</label>
            <input type="file" name="new-image" id="new-image">
            <?php  
            $img = renderImg($item['image'],150);
            echo $img;
            ?>
            <input type="hidden" name="old-image" value="<?php echo $img ?>
        </div>
        <div class="item-form-bottom">
            <input type="submit" value="Apply changes" class="confirm-buttons">
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