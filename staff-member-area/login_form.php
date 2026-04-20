
<?php  
require_once '../config/config.php';

    title_bar("Login page",['css/forms.css']);
    alreadyAuthorised();
    
    ?>

<h1 class="title">Login </h1>

<form method="POST" action="login.php" class="login-form" id="main">
    <?php displayError()?>
    <label for="username">Email</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

    <button type="submit" class="confirm-buttons">Login</button>
</form>
<?php require '../templates/project_footer.php'?>
<script src="../js/main.js"></script>
</body>
</html>
