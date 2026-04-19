<?php
require_once __DIR__ . '/../config/config.php';

function title_bar($title = "Hoop avenue")
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/horizontal.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/footer.css">
    </head>

    <body>
    <script src="js/main.js"></script>

        <a href="#main" class="skip-link">Skip to main content</a>

        <nav class="navbar">
            <button class="hamburger" onclick="toggleMenu()">
                ☰
            </button>
            <a href="<?php echo BASE_URL; ?>index.php" class="logo">
                <img src="<?php echo BASE_URL; ?>logo/01a9431c-1698-4922-913a-42ed3a706026.png" alt="hoop avenue logo">
            </a>
            <div id="nav-links">
                <a href="<?php echo BASE_URL; ?>aboutus.php" class="nav-links">About us</a>
                <a href="<?php echo BASE_URL; ?>items.php" class="nav-links">Basketballs</a>
                <a href="<?php echo BASE_URL; ?>contact.php" class="nav-links">Contact</a>
                <a href="<?php echo BASE_URL; ?>review.php" class="nav-links">Customer reviews</a>
                <a href="<?php echo BASE_URL; ?>staff-member-area/login_form.php" class="nav-links">Staff area</a>
                <a href="<?php echo BASE_URL; ?>cart.php" class="nav-links">
                    Cart <i class="fa fa-shopping-cart"></i>
                </a>
            </div>

        </nav>

    <?php
}
