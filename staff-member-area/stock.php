<?php
require_once '../config/config.php';
$_SESSION['last_activity'] = time();
title_bar("Stock",['css/style.css']);

requireAuthorisation();



$stmt = $pdo->query("SELECT * FROM items");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<section class="container" id="main">
    <table>
        <tbody>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Alternative Name</th>
                <th>Brand</th>
                <th>Colour</th>
                <th>Size</th>
                <th>Surface type</th>
                <th>Long Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Ratings</th>
                <th>Options</th>
            </tr>

            <?php
            foreach ($rows as $row) {
                echo "<tr><td>";
                $img = renderImg($row['image'],100,$row['alt_name']);
                echo $img;
                echo "</td><td>";
                echo (htmlentities($row['name'] ?? 'Missing detail!'));
                echo "</td><td>";
                echo (htmlentities($row['alt_name']?? 'Missing detail!'));
                echo "</td><td>";
                echo (htmlentities($row['brand']?? 'Missing detail!'));
                echo "</td><td>";
                echo (htmlentities($row['colour']?? 'Missing detail!'));
                echo "</td><td>";
                echo (htmlentities($row['size']?? 'Missing detail!'));
                echo "</td><td>";
                echo (htmlentities($row['surface']?? 'Missing detail!'));
                echo "</td>";
                echo "<td><div class='description-cell' tabindex='0' style='width:100px'>";
                echo (htmlentities($row['long_description']?? 'Missing detail!'));
                echo "</div></td><td>";
                echo (htmlentities($row['quantity']?? 'Missing detail!'));
                echo "</td><td>";
                echo (htmlentities($row['price']?? 'Missing detail!'));
                echo "</td><td>";
                echo (htmlentities($row['ratings']?? 'Missing detail!'));
                echo "</td><td>";
                echo '<div class="options">';
                echo '<a class="btn1" href="updateitem.php?itemid=' . urldecode($row['id']) . '">Update item</a>';
                echo '<a class="btn2" href="deleteitem.php?itemid=' . urldecode($row['id']) . '">Delete item</a>';
                echo '</div>';
                echo "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>

    <section class="page-redirect-buttons">
        <form method="POST" action="additem.php">
            <button type="submit" class="confirm-buttons">Add more items</button>
        </form>
        <form action="membersarea.php" method="post">
            <button type="submit" class="confirm-buttons">Go back to member area</button>
        </form>
    </section>



    <script src="../js/main.js"></script>

</body>

</html>