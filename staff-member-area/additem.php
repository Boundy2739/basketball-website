<?php
session_start();
require_once "../pdo.php";
require '../templates/project_header.php';
require '../templates/project_footer.php';
require '../models/userauthorisation.php';
title_bar("Stock");
requireAuthorisation();
if (isset($_POST['itemname']) && isset($_POST['quantity']) && isset($_POST['price'])) {

    $imagename = NULL;

    if (isset($_FILES['choosefile']) && $_FILES['choosefile']['error'] === 0) {
        $imagename = $_FILES['choosefile']['name'];
        $imagesize = $_FILES["choosefile"]["size"];
        $tempname = $_FILES["choosefile"]["tmp_name"];


        $file_info = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $file_info->file($tempname);

        $allowed_images = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/x-gif'];

        if (in_array($mime_type, $allowed_images) === false) {
            header('Location: additem.php');
            exit;
        }
        $max_size = 4 * 1024 * 1024;

        if ($max_size < $imagesize) {
            header('Location: additem.php');
            exit;
        }

        $folder = "../uploaded_images/" . $imagename;
        // query to insert the submitted data
        $sql = "INSERT INTO images(filename) 
                    VALUES (:theFile)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':theFile' => $imagename
        ));
        move_uploaded_file($tempname, $folder);
    }

    $sql = "INSERT INTO items (image,name, quantity,price) 
    VALUES (:image,:name, :quantity, :price)";
    echo ("<pre>\n" . $sql . "\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':image' => $imagename,
        ':name' => $_POST['itemname'],
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
    <title>Document</title>
</head>

<body>
    <p>Add items </p>
    <form method="post" class="login-form" enctype="multipart/form-data">
        <label for="itemname">Item name:</label>
        <input type="text" name="itemname" id="itemname" required>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" required>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required>
        <label for="item-image">Upload item image:</label>
        <input type="file" name="choosefile" value="" id="item-image">
        <input type="submit" value="Add item" class="confirm-buttons">
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