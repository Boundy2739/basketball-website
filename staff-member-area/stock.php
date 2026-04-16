<?php
session_start();
require_once "../pdo.php";
require '../templates/project_header.php';
require '../templates/project_footer.php';
require '../functions/userauthorisation.php';
require '../functions/renderimage.php';
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
                    <th>Brand</th>
                    <th>Long Description</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Ratings</th>
                    <th>Options</th>
                </tr>
                <tr>

                    <?php
                    foreach ($rows as $row) {
                        if ($row['ratings'] == NULL) {
                            $row['ratings'] = "No ratings!";
                        }
                        echo "<tr><td>";
                        $img = renderImg($row['image'],100);
                        echo $img;
                        echo "</td><td>";
                        echo (htmlentities($row['name']));
                        echo "</td><td><div class='description-cell' style='width:100px'>";
                        echo (htmlentities($row['brand']));
                        echo "</div></td>";
                        echo "<td><div class='description-cell' style='width:100px'>";
                        echo (htmlentities($row['long_description']));
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