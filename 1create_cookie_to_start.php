<?php

if (isset($_POST['fav_food']) ){ 
	$cookie_value = $_POST['fav_food'];
	setcookie('food', $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}
?>

<html>
<body>


<form method = "post">
 <label for="fav_food">Enter Your Favourite Dish</label>
 <input name="fav_food" id="fav_food" type="text">
 <input type = "submit">
</form>

<?php
if(isset($_COOKIE['food'])) {
    echo '<h1>' . $_COOKIE['food'] . ' is your favourite food</h1>';
}
?>


</body>
</html> 




