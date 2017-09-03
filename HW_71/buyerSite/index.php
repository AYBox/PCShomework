<?php
    $action = "home";
    if(!empty($_GET['action'])) {
        $action = $_GET['action'];
    }

    switch($action) {
        case 'home':
            include 'controllers/homeController.php';
            exit;
        case 'products':
            include 'controllers/productsController.php';
            exit;
        case 'cart':
            include 'controllers/cartController.php';
            exit;
        default:
            $actionError = "Dont know how to $action";
            include 'controllers/homeController.php';
            exit;
    }
?>