<?php
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(empty($_POST['name'])){
            $errors[]="Sefer Name is a required field";
        }else{
            $name = $_POST['name'];
        }
        if(isset($_POST['price'])) $price = $_POST['price'];
        if(empty($_POST['price'])){
            $errors[]="Price is a required field";
        }elseif(!is_numeric($_POST['price']) || $_POST['price']<=0){
            $errors[]="Price must be a numeric value greater than 0";
        }
    }    
    include "../models/addSeferModel.php";
    include "../views/addSeferView.php";
?>