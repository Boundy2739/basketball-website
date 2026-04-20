<?php
require_once '../config/config.php';

unset($_SESSION['retrun_page']);


$_SESSION['last_activity'] = time();
title_bar("Update stock", ['css/forms.css']);
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
    saveFormData();
    $_SESSION['retrun_page'] = '../staff-member-area/updateitems.php';

    $columns = [];
    $parameters = [":id" => $_GET['itemid']];

    if (!empty($_POST['new-name'])) {
        array_push($columns, 'name =:name');
        $parameters[':name'] = $_POST['new-name'];
    }

    if (!empty($_POST['new-alt'])) {
        array_push($columns, 'alt_name =:alt_name');
        $parameters[':alt_name'] = $_POST['new-alt'];
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
    if (!empty($_POST['new-colour'])) {
        array_push($columns, 'colour =:colour');
        $parameters[':colour'] = $_POST['new-colour'];
    }
    if (!empty($_POST['new-size'])) {
        array_push($columns, 'size =:size');
        $parameters[':size'] = $_POST['new-size'];
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
    deleteFormData();
    header('Location: stock.php');
}

?>
<h1 class="title">Update items</h1>
<form method="post" class="item-form" enctype="multipart/form-data" id="main">
    <div class="error"><?php displayError(); ?></div>
    <div class="item-form-left">
        <label for="new-name">Item name:</label>
        <input type="text" name="new-name" id="new-name" value="<?php echo htmlspecialchars(restoreFormData('new-name', $item['name']), ENT_QUOTES, 'UTF-8') ?>">
        <label for="new-alt">Item name:</label>
        <input type="text" name="new-alt" id="new-alt" value="<?php echo htmlspecialchars(restoreFormData('new-alt', $item['alt_name']), ENT_QUOTES, 'UTF-8') ?>">
        <label for="new-brand">Brand:</label>
        <input name="new-brand" id="new-brand" placeholder="Item brand" value="<?php echo htmlspecialchars(restoreFormData('new-brand', $item['brand']), ENT_QUOTES, 'UTF-8') ?>">
        <label for="new-size">Size:</label>
            <select name="new-size" id="new-size">
                <option value="">select size</option>
                <option value=7>Size 7</option>
                <option value="6">Size 6</option>
                <option value="5">Size 5</option>
                <option value="4">Size 4</option>
            </select>
            <label for="new-colour">Colour:</label>
            <select name="new-colour" id="new-colour">
                <option value="">select colour</option>
                <option value="white">white</option>
                <option value="red">red</option>
                <option value="yellow">yellow</option>
                <option value="green">green</option>
                <option value="orange">orange</option>
                <option value="black">black</option>
                <option value="pink">pink</option>
                <option value="blue">blue</option>
                <option value="cyan">cyan</option>
                <option value="gray">gray</option>
                <option value="purple">purple</option>
                <option value="themed">themed</option>
            </select>
        <label for="new-surface">Surface:</label>
        <select name="new-surface" id="new-surface">
            <option value="">select type</option>
            <option value="indoor">indoor</option>
            <option value="outdoor">outdoor</option>
            <option value="both">both</option>
        </select>
        <label for="new-quantity">Quantity:</label>
        <input type="number" name="new-quantity" id="new-quantity" value="<?php echo htmlspecialchars(restoreFormData('new-quantity', $item['quantity']), ENT_QUOTES, 'UTF-8') ?>">
        <label for="new-price">Price:</label>
        <input type="number" name="new-price" id="new-price" value="<?php echo htmlspecialchars(restoreFormData('new-price', $item['price']), ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <div class="item-form-right">
        <label for="new-image">Upload item image:</label>
        <input type="file" name="new-image" id="new-image">
        <?php
        $img = renderImg($item['image'], 150, $item['alt_name']);
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
<script src="../js/main.js"></script>
</body>

</html>