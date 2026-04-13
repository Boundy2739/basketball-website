<?php
session_start();
require_once "../pdo.php";
require '../project_header.php';
title_bar("Stock");

requireAuthorisation();



$stmt = $pdo->query("SELECT * FROM items");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<html>

<head>
    <title>Stock</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <section class="container">
        <table>
            <tbody>
                <tr>

                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Ratings</th>
                    <th>Options</th>
                </tr>
                <tr>

                    <?php
                    foreach ($rows as $row) {
                        if ($row['name'] == NULL) {
                            $row['name'] = "Missing name!";
                        }
                        if ($row['description'] == NULL) {
                            $row['description'] = "Missing description!";
                        }
                        if ($row['price'] == NULL) {
                            $row['price'] = "Missing price!";
                        }
                        if ($row['quantity'] == NULL) {
                            $row['quantity'] = 0;
                        }
                        if ($row['ratings'] == NULL) {
                            $row['ratings'] = "No ratings!";
                        }
                        if ($row['image'] == NULL) {
                            echo "<tr><td>";
                            echo '<div class="options">';
                            echo '<a clas="btn1" href="upload.php?itemid=' . $row['id'] . '">Upload image</a>';
                            echo '</div>';
                            echo "</td><td>";
                        } else {
                            echo "<tr><td>";
                            echo '<div class="options">';
                            echo '<img src="../uploaded_images/' . $row['image'] . '" alt="" width="20%">';
                            echo '<a class="btn2" href="deleteimages.php?imageid=' . $row['id'] . '">Delete image</a>';
                            echo '</div>';
                            echo "</td><td>";
                        }
                        echo (htmlentities($row['name']));
                        echo "</td><td><div class='description-cell'>";
                        echo (htmlentities($row['description']));
                        echo "</div></td><td>";
                        echo (htmlentities($row['quantity']));
                        echo "</td><td>";
                        echo (htmlentities($row['price']));
                        echo "</td><td>";
                        echo (htmlentities($row['ratings']));
                        echo "</td><td>";
                        echo '<div class="options">';
                        echo '<a class="btn1" href="updateitem.php?itemid=' . $row['id'] . '">Update item</a>';
                        echo '<a class="btn2" href="deleteitem.php?itemid=' . $row['id'] . '">Delete item</a>';
                        echo '</div>';
                        echo "</td></tr>";
                    }
                    ?>

                </tr>
            </tbody>
        </table>
        </div>
    </section>
    <section class="page-redirect-buttons">
        <form method="POST" action="additem.php">
            <button type="submit" class="confirm-buttons">Add more items</button>
        </form>
        <form action="membersarea.php" method="post">
            <button type="submit" class="confirm-buttons">Go back to member area</button>
        </form>
    </section>





</body>

</html>