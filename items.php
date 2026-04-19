<?php
require './templates/project_header.php';
require_once './functions/pdo.php';
require_once './functions/renderimage.php';
require_once './functions/searchfunction.php';

title_bar("Basketballs");


$stmt = $pdo->query("SELECT id, image, name,brand,surface, quantity, price,alt_name FROM items");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parameters = array(
        "item-name" => $_POST['searchfield'],
        "item-brand" => $_POST['brand'],
        "surface" => $_POST['surface'],
        "min-price" => $_POST['min-price'] !== '' ? (float)$_POST['min-price'] : 0,
        "max-price" => $_POST['max-price'] !== '' ? (float)$_POST['max-price'] : 999999,
        "sort-type" => $_POST['sort'] ?? '',
    );
    $rows = search($pdo, $parameters);
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="stylesheet" href="css/items.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css">
    <title>Basketballs</title>
</head>

<body>

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
                            <label for="sort">Sort by</label>
                            <select name="sort" id="sort">
                                <option value="">Sort by</option>
                                <option value="price_low">Price: Low → High</option>
                                <option value="price_high">Price: High → Low</option>
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
                    echo '<article>';
                    echo '<figure>';
                    $img = renderImg($row['image'],100,$row['alt_name']);
                    echo $img;
                    echo '<figcaption class="item-name">';
                    echo '<p>' . htmlentities($row['name']) . '</p>';
                    echo '<p>' . htmlentities($row['brand']) . '</p>';
                    echo '</figcaption>';
                    echo '</figure>';
                    echo '<p class="price">£' . htmlentities($row['price']) . '</p>';
                    echo '<div><a href="product_template.php?itemid=' . $row['id'] . '" class="viewbtn">View product</a></div>';
                    echo '</article>';
                    echo '</li>';
                }
                ?>
            </ul>
        </section>

    </section>
    <?php require './templates/project_footer.php' ?>
    <script src="js/main.js"></script>
</body>

</html>