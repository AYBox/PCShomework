<?php
require_once "utils/cart.php";
    $items = ["chumash", "mishnayos", "Mishna Berura", "q", "w", "e", "r", "t", "y", "u"];
    if(!empty($_POST)){
        if(!empty($_POST['item']) && !empty($_POST['qty'])){
            $item = $_POST['item'];
            $qty = $_POST['qty'];
            $cart = new Cart();
            $cart->addItem($item, $qty);
        }
    };
    ?>