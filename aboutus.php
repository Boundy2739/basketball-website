<!doctype html>
<?php
require './templates/project_header.php';
title_bar("About Us");
?>

<head>
  <title>About Us</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/aboutus.css">
</head>

<body>
  <main class="about-container" id="main">

    <section class="about-hero">
      <img src="<?php echo BASE_URL; ?>logo/01a9431c-1698-4922-913a-42ed3a706026.png" alt="Basketball Store">

      <article class="about-text">
        <h1>About Our Store</h1>
        <p>
          We're more than a basketball store — we're a community for players,
          fans, and hoop dreamers. From street courts to pro arenas, our mission
          is to bring you the best gear to elevate your game.
        </p>
        <p>
          Founded by basketball lovers, we carefully select shoes, jerseys,
          accessories, and equipment trusted by athletes worldwide.
        </p>
      </article>
    </section>

    <div class="about-values">
      <div class="value-card">
        <h3>Passion</h3>
        <p>Basketball isn't just a sport to us — it's a lifestyle.</p>
      </div>

      <div class="value-card">
        <h3>Quality</h3>
        <p>We stock only authentic, high-performance products.</p>
      </div>

      <div class="value-card">
        <h3>Community</h3>
        <p>Supporting local players, teams, and basketball culture.</p>
      </div>
    </div>

</main>

  <?php require './templates/project_footer.php'; ?>
</body>

</html>