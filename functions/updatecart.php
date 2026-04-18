<?php
session_start();
if(!empty($_POST['quantity'])){
    print_r($_POST);
    $_SESSION['cart'][$_POST['product-id']]['quantity'] = $_POST['quantity'];
    $_SESSION['cart'][$_POST['product-id']]['totalprice'] = (int)$_POST['quantity'] * (float)$_SESSION['cart'][$_POST['product-id']]['singleprice'];
    print_r($_SESSION['cart']);
    header('Location: cart.php');
            exit;
}

?>