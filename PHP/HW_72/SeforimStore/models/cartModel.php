<?php
    require_once "utils/cart.php";
    $cart = new Cart();
    if(isset($_POST['clearCart'])) $cart->clearCart();
?>