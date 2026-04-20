
<?php  
require './templates/project_header.php';
title_bar("Home", $style = ['css/style.css']);
?>

<main class="home-container" id="main">

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
            <h2>Shoes</h2>
            <p>
                Performance basketball shoes designed for grip,
                speed and comfort on the court.
            </p>
        </article>

        <article class="home-card">
            <h2>Clothing</h2>
            <p>
                Jerseys, shorts and training gear suitable for both
                practice sessions and competitive games.
            </p>
        </article>

        <article class="home-card">
            <h2>Equipment</h2>
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