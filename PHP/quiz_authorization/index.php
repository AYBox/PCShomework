<?php
    require_once "utils/httpsonly.php";
    include_once "utils/autoload.php";
    session_start();
    $action = "home";
    if(!empty($_GET['action'])) {
        $action = $_GET['action'];
    }

    switch($action) {
        case 'home':
            include 'controllers/homeController.php';
            exit;
        case 'register':
            include 'controllers/registerController.php';
            exit;
        case 'logout':
            include 'controllers/logoutController.php';
            exit;
        case 'login':
            include 'controllers/logInController.php';
            exit;
        case 'processAddProduct':
            include 'controllers/addProductController.php';
            exit;
        default:
            $actionError = "Dont know how to $action";
            include 'controllers/homeController.php';
            exit;
    }
?>