<?php
    if($_SERVER['REQUEST_METHOD']==='POST')
    {
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
        if(empty($errors)){
            $query = "INSERT INTO `seforim`(`name`, `price`) VALUES (:name, :price)";
            include "db.php";
            try{
                $statement = $db->prepare($query);
                $statement->bindValue('name', $name);
                $statement->bindValue('price', $price);
                $success = $statement->execute();
                if($success){
                    $query = "SELECT * FROM seforim WHERE name = :name AND price = :price";
                    $statement = $db->prepare($query);
                    $statement->bindValue('name', $name);
                    $statement->bindValue('price', $price);
                    $statement->execute();
                    $selectedSefer = $statement->fetch();
                }                
            } catch (PDOException $e) {
                $error = "Something went wrong " . $e->getMessage();
            }
        }        
    }
?>