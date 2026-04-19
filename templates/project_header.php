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

        <a href="#main" class="skip-link">Skip to main content</a>

        <nav>

            <a href="<?php echo BASE_URL; ?>index.php" class="logo">
                <img src="<?php echo BASE_URL; ?>logo/01a9431c-1698-4922-913a-42ed3a706026.png">
            </a>

            <a href="<?php echo BASE_URL; ?>aboutus.php">About us</a>
            <a href="<?php echo BASE_URL; ?>items.php">Basketballs</a>
            <a href="<?php echo BASE_URL; ?>contact.php">Contact</a>
            <a href="<?php echo BASE_URL; ?>review.php">Customer reviews</a>
            <a href="<?php echo BASE_URL; ?>staff-member-area/login_form.php">Staff area</a>
            <a href="<?php echo BASE_URL; ?>cart.php">
                Cart <i class="fa fa-shopping-cart"></i>
            </a>

        </nav>

    <?php
}
    ?>