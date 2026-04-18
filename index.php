<!doctype html>
<?php  
require './templates/project_header.php';
title_bar("Home");
?>

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header></header>

<main class="home-container">

    <section class="home-intro">
        <h1>Hoop avenue</h1>
        <p>
            Your place for basketball gear, clothing and accessories.
            Whether you're training, playing matches or just a fan of the sport,
            we aim to provide quality products for every player.
        </p>
    </section>

    <section class="home-categories">

        <article class="home-card">
            <h3>Shoes</h3>
            <p>
                Performance basketball shoes designed for grip,
                speed and comfort on the court.
            </p>
        </article>

        <article class="home-card">
            <h3>Clothing</h3>
            <p>
                Jerseys, shorts and training gear suitable for both
                practice sessions and competitive games.
            </p>
        </article>

        <article class="home-card">
            <h3>Equipment</h3>
            <p>
                Basketballs, pumps and accessories for indoor
                and outdoor play.
            </p>
        </article>

    </section>

</main>

<?php
require './templates/project_footer.php';
?>

</body>
</html>