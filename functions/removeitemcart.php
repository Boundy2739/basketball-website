<?php
session_start();
if(isset($_GET['itemid'])){
    unset($_SESSION['cart'][$_GET['itemid']]);
    header('Location: ../cart.php');
            exit;
        }

?>