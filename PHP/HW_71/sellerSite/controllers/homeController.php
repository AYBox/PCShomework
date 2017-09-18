<?php
    if(isset($_POST['sefer'])){
        if (! empty($_POST['sefer']) && is_numeric($_POST['sefer'])){
            $deleteID = $_POST['sefer'];
        }else{
            $deleteError = "You have not submitted a valid numeric ID";
        }
    }
    if(isset($_GET["sefer"])) {
        if(empty($_GET["sefer"]) || !is_numeric($_GET["sefer"])) {
            $selectError = "A valid sefer id must be submitted";
        } else {
            $selectId = $_GET['sefer'];
        }
    }
    include "models/homeModel.php";
    include "views/homeView.php";
?>