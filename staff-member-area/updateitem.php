<?php
session_start();

unset($_SESSION['retrun_page']);

require_once "../functions/pdo.php";
require '../templates/project_header.php';
require '../functions/userauthorisation.php';
require '../functions/validateinputs.php';
require '../functions/validateimage.php';
require '../functions/imageupdate.php';
require '../functions/renderimage.php';
require '../functions/keepforminputs.php';
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
    $_SESSION['retrun_page'] = '../staff-member-area/updateitems.php';

    $columns = [];
    $parameters = [":id" => $_GET['itemid']];

    if (!empty($_POST['new-name'])) {
        array_push($columns, 'name =:name');
        $parameters[':name'] = $_POST['new-name'];
    }
    if (!empty($_POST['new-price'])) {
        array_push($columns, 'price =:price');
        $parameters[':price'] = $_POST['new-price'];
    }
    if (!empty($_POST['new-brand'])) {
        array_push($columns, 'brand =:brand');
        $parameters[':brand'] = $_POST['new-brand'];
    }

    if (!empty($_POST['new-quantity'])) {
        array_push($columns, 'quantity =:quantity');
        $parameters[':quantity'] = $_POST['new-quantity'];
    }

    if (!empty($_POST['new-surface'])) {
        array_push($columns, 'surface =:surface');
        $parameters[':surface'] = $_POST['new-surface'];
    }
    if (!empty($_POST['new-long-desc'])) {

        array_push($columns, 'long_description =:long_desc');
        $parameters[':long_desc'] = $_POST['new-long-desc'];
    }
    $sql = "UPDATE items set " . implode(', ', $columns) . " WHERE id =:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($parameters);
    if (!empty($_FILES['new-image']['name'])) {
        $result = update_img($pdo, $_POST['old-image'], $_FILES['new-image'], $item);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
    <title>Document</title>
</head>

<body>
    <p>Add items </p>
    <form method="post" class="item-form" enctype="multipart/form-data">
        <div class="error"><?php displayError(); ?></div>
        <div class="item-form-left">
            <label for="itemname">Item name:</label>
            <input type="text" name="new-name" id="new-name" value="<?php echo htmlspecialchars(restoreFormData('brand', $item['name']), ENT_QUOTES, 'UTF-8') ?>">
            <label for="new-brand">Brand:</label>
            <input name="new-brand" id="new-brand" placeholder="Item brand" value="<?php echo htmlspecialchars(restoreFormData('brand', $item['brand']), ENT_QUOTES, 'UTF-8') ?>">
            <label for="new-surface">Surface type</label>
            <select name="new-surface" id="new-surface">
                <option value="">select type</option>
                <option value="indoor">indoor</option>
                <option value="outdoor">outdoor</option>
                <option value="both">both</option>
            </select>
            <label for="quantity">Quantity:</label>
            <input type="number" name="new-quantity" id="new-quantity" value="<?php echo htmlspecialchars(restoreFormData('quantity', $item['quantity']), ENT_QUOTES, 'UTF-8') ?>">
            <label for="price">Price:</label>
            <input type="number" name="new-price" id="new-price" value="<?php echo htmlspecialchars(restoreFormData('price', $item['price']), ENT_QUOTES, 'UTF-8') ?>">
        </div>
        <div class="item-form-right">
            <label for="item-image">Upload item image:</label>
            <input type="file" name="new-image" id="new-image">
            <?php
            $img = renderImg($item['image'], 150);
            echo $img;
            ?>
            <input type="hidden" name="old-image" value="<?php echo $img ?>
        </div>
        <div class=" item-form-bottom">
            <label for="new-long-desc">Description:</label>
            <textarea name="new-long-desc" id="new-long-desc"><?php echo htmlspecialchars(restoreFormData('long-desc', $item['long_description']), ENT_QUOTES, 'UTF-8') ?></textarea>
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