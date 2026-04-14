<?php
session_start();
require_once "../pdo.php";
require '../templates/project_header.php';
require '../templates/project_footer.php';
require '../models/userauthorisation.php';
require '../models/imageupdate.php';
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

    echo 'test';
    if (!empty($_POST['new-desc'])) {
        $sql = "UPDATE items
            set description =:description
            WHERE id =:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':id' => $_GET['itemid'],
            ':description' => $_POST['new-desc']

        ));
    }
    echo 'test';
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
    <title>Document</title>
</head>

<body>
    <p>Add items </p>
    <form method="post" class="login-form" enctype="multipart/form-data">
        <label for="itemname">Item name:</label>
        <input type="text" name="new-name" id="new-name"  value="<?php echo htmlentities($item['name']) ?>">
        <label for="item-desc">Item description:</label>
        <input type="text" name="new-desc" id="new-desc"  value="<?php echo htmlentities($item['description']) ?>">
        <label for="quantity">Quantity:</label>
        <input type="number" name="new-quantity" id="new-quantity"  value="<?php echo htmlentities($item['quantity']) ?>">
        <label for="price">Price:</label>
        <input type="number" name="new-price" id="new-price"  value="<?php echo htmlentities($item['price']) ?>">
        <label for="item-image">Upload item image:</label>
        <input type="file" name="new-image" id="new-image">
        <img src="../uploaded_images/<?php echo htmlspecialchars($item['image']) ?>" width="150">
        <input type="hidden" name="old-image" required value="<?php echo htmlspecialchars($item['image']) ?>">
        <input type="submit" value="Apply changes" class="confirm-buttons">
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