<?php
require './templates/project_header.php';
require_once './functions/pdo.php';
require_once './functions/renderimage.php';
require_once './functions/searchfunction.php';

title_bar("Basketballs", ['css/items.css']);


$stmt = $pdo->query("SELECT id, image, name,brand,surface, quantity, price,alt_name FROM items");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parameters = array(
        "item-name" => $_POST['searchfield'],
        "item-brand" => $_POST['brand'],
        "surface" => $_POST['surface'],
        "min-price" => $_POST['min-price'] !== '' ? (float)$_POST['min-price'] : 0,
        "max-price" => $_POST['max-price'] !== '' ? (float)$_POST['max-price'] : 999999,
        "colour" => $_POST['colour'],
        "size" => $_POST['size'],
    );
    $rows = search($pdo, $parameters);
}
?>

<section class="main-grid" id="main">
    <h1 class="title">Basketballs</h1>
    <section class="searchbar">

        <form method="POST">
            <fieldset>
                <legend>Search filters</legend>
                <div class="searchfield-container">

                    <div>
                        <label for="searchfield">Item name</label>
                        <input type="text" name="searchfield" id="searchfield" placeholder="Search by name" class="searchfields">
                    </div>
                    <div class="hiddenfields">
                        <label for="surface">Surface type</label>
                        <select name="surface" id="surface">
                            <option value="">All types</option>
                            <option value="indoor">Indoor</option>
                            <option value="outdoor">Outdoor</option>
                            <option value="both">Indoor/Outdoor</option>
                        </select>
                    </div>
                    <div class="hiddenfields">
                        <label for="size">Size</label>
                        <select name="size" id="size">
                            <option value="">select size</option>
                            <option value=7>Size 7</option>
                            <option value="6">Size 6</option>
                            <option value="5">Size 5</option>
                            <option value="4">Size 4</option>
                        </select>

                    </div>
                    <div class="hiddenfields">
                        <label for="colour">Colour:</label>
                        <select name="colour" id="colour">
                            <option value="">select colour</option>
                            <option value="white">white</option>
                            <option value="red">red</option>
                            <option value="yellow">yellow</option>
                            <option value="green">Green</option>
                            <option value="orange">orange</option>
                            <option value="black">black</option>
                            <option value="pink">pink</option>
                            <option value="blue">blue</option>
                            <option value="cyan">cyan</option>
                            <option value="gray">gray</option>
                            <option value="purple">purple</option>
                            <option value="themed">themed</option>
                        </select>
                    </div>
                    <div class="hiddenfields">
                        <label for="brand">Brand name</label>
                        <input type="text" name="brand" id="brand">
                    </div>
                    <div class="hiddenfields">
                        <label for="min-price">Minimum price</label>
                        <input type="number" name="min-price" id="min-price">
                    </div>
                    <div class="hiddenfields">
                        <label for="max-price">Maximum price</label>
                        <input type="number" name="max-price" id="max-price">
                    </div>
                </div>
                <div class="buttons-container">
                    <input type="submit" value="search">
                    <button type="button" class="showfields" onclick="showItemFilters()">Advanced search</button>
                    <button type="button" class="hiddenfields" onclick="hideFilters()">Hide advanced search</button>
                </div>

            </fieldset>
        </form>

    </section>

    <section class="main-content">
        <ul class="items-list">
            <?php
            foreach ($rows as $row) {
                echo '<li class="individual-item">';
                echo '<figure>';
                $img = renderImg($row['image'], 100, $row['alt_name']);
                echo $img;
                echo '<figcaption class="item-name">';
                echo '<p>' . htmlentities($row['name']) . '</p>';
                echo '<p>' . htmlentities($row['brand']) . '</p>';
                echo '</figcaption>';
                echo '</figure>';
                echo '<p class="price">£' . htmlentities($row['price']) . '</p>';
                echo '<div><a href="product_template.php?itemid=' . urlencode($row['id']) . '" class="viewbtn">View product</a></div>';
                echo '</li>';
            }
            ?>
        </ul>
    </section>

</section>
<?php require './templates/project_footer.php' ?>

</body>

</html>