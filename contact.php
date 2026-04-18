<!doctype html>
<?php 
require './templates/project_header.php';
title_bar("Contact us") ?>

<head>
    <link rel="stylesheet" href="css/contact.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="contact-container">

        <div class="contact-hero">
            <div class="contact-text">
                <h1>Contact Us</h1>
                <p>
                    Have questions about our products? Need help with an order?
                    We're here to help. Fill out the form below and our team will
                    get back to you as soon as possible.
                </p>
            </div>
            <img src="images/" alt="Contact us">
        </div>

        <!-- Contact Form Section -->
        <div class="contact-content">

            <form method="post" action="send_message.php" class="contact-form">
                <h2>Send a Message</h2>

                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" required>

                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required>

                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" required>

                <label for="message">Message</label>
                <textarea name="message" id="message" rows="5" required></textarea>

                <button type="submit" class="confirm-buttons">Send Message</button>
            </form>

            <!-- Contact Info Cards -->
            <div class="contact-info">
                <div class="info-card">
                    <h3>Email</h3>
                    <p>support@yoursite.com</p>
                </div>

                <div class="info-card">
                    <h3>Phone</h3>
                    <p>+1 234 567 890</p>
                </div>

                <div class="info-card">
                    <h3>Address</h3>
                    <p>123 Sports Street<br>New York, NY</p>
                </div>
            </div>

        </div>

    </div>
    <?php require './templates/project_footer.php'?>
</body>

</html>