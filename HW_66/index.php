<?php
    $action = "addSefer";
    if(!empty($_GET['action'])) {
        $action = $_GET['action'];
    }

    switch($action) {
        case 'home':
            include 'controllers/homeController.php';
            exit;
        case 'addSefer':
            include 'controllers/addSeferController.php';
            exit;
        default:
            $actionError = "Dont know how to $action";
            include 'controllers/homeController.php';
            exit;
    }
?>