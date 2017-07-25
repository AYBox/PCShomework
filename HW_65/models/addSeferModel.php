<?php
    if(!empty($name) && !empty($price)){
        include "../utils/db.php";
        $query = "INSERT INTO `seforim`(`name`, `price`) VALUES (:name, :price)";
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
            }else{
                $errors[] = "Error:Sefer $name was not added";
            }
        } catch (PDOException $e) {
            $errors[] = "Something went wrong " . $e->getMessage();
        }
    }
?>