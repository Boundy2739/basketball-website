<!doctype html>
<?php  
require './templates/project_header.php';
require './templates/project_footer.php';

title_bar("Home");
?>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header></header>

<main class="home-container">

    <section class="home-intro">
        <h1>Welcome to Unnamed Basketball Store</h1>
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
footer();
?>

</body>
</html>