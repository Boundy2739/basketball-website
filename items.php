<!doctype html>
<?php
require './templates/project_header.php';
require './templates/project_footer.php';
require_once 'pdo.php';
include 'searchfunction.php';

title_bar("Basketballs");


$stmt = $pdo->query("SELECT id, image, name, quantity, price FROM items");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parameters = array(
        "item-name" => $_POST['searchfield'],
        "item-brand" => $_POST['brand'],
        "item-type" => $_POST['surface'] ?? '',
        "min-price" => $_POST['min-price'] !== '' ? (float)$_POST['min-price'] : 0,
        "max-price" => $_POST['max-price'] !== '' ? (float)$_POST['max-price'] : 999999,
        "sort-type" => $_POST['sort'] ?? '',
    );
    $rows = search($pdo, $parameters);
    print_r($parameters);
}
?>

<head>
    <link rel="stylesheet" href="css/items.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css">
    <title>Basketballs</title>
</head>

<body>

    <div class="main-grid">

        <section class="header">
            <form method="POST">
                <div class="searchfield-container">
                    <input type="text" name="searchfield" id="searchfield" placeholder="Search" class="searchfields">
                    <select name="surface" id="surface" class="hiddenfields">
                        <option value="">All types</option>
                        <option value="indoor">Indoor</option>
                        <option value="outdoor">Outdoor</option>
                        <option value="both">Indoor/Outdoor</option>
                    </select>
                    <select name="sort" id="sort" class="hiddenfields">
                        <option value="">Sort by</option>
                        <option value="price_low">Price: Low → High</option>
                        <option value="price_high">Price: High → Low</option>
                    </select>
                    <input type="text" name="brand" id="brand" class="hiddenfields" value="">
                    <input type="number" name="min-price" id="min-price" class="hiddenfields">
                    <input type="number" name="max-price" id="max-price" class="hiddenfields">
                    <button type="submit"><i class="fa fa-search"></i></button>

                </div>


            </form>

            <h1>Basketballs</h1>
        </section>

        <section class="main">
            <ul class="items-list">
                <?php
                foreach ($rows as $row) {
                    echo '<li class="individual-item">';
                    echo '<article>';
                    echo '<figure>';
                    echo '<img src="uploaded_images/' . htmlentities($row['image']) . '" alt="Basketball item" style="width:100px">';
                    echo '<figcaption class="item-name">';
                    echo '<p>' . htmlentities($row['name']) . '</p>';
                    echo '</figcaption>';
                    echo '</figure>';
                    echo '<div class="item-description">';
                    echo '<p> Item desc</p>';
                    echo '<p class="price">£' . htmlentities($row['price']) . '</p>';
                    echo '<div><a href="product_template.php?itemid=' . $row['id'] . '" class="viewbtn">View product</a></div>';
                    echo '</div>';
                    echo '</article>';
                    echo '</li>';
                }
                ?>
            </ul>
        </section>

    </div>
    <script src="/js/main.js"></script>
</body>

</html>