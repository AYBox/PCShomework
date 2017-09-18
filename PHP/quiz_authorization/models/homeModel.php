<?php
    require_once "utils/loggedInOnly.php";
    include_once "utils/autoload.php";

    $query = "SELECT name, description, price, url FROM items";
    $db = Db::getDb();
    try{
        $results = $db->query($query);
        $productInfoArray = $results->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
        $_SESSION['errors'][] = "Something went wrong " . $e->getMessage();
    }

    if(!empty($_SESSION['errors'])){
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
    }
?>