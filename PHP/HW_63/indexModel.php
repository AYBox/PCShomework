<?php
    include "seforimModel.php";
    try {    
        if(isset($_GET["sefer"])) {
            if(empty($_GET["sefer"] || !is_numeric($_GET["sefer"]))) {
                $error = "A valid sefer id must be submitted";
            } else {
                $theId = $_GET['sefer'];
                
                $query = "SELECT id, name, price FROM seforim WHERE id = :theId";
                //$query = "SELECT name, price FROM seforim WHERE id = ?";
                $statement = $db->prepare($query);
                //$statement->bindParam('theId', $theId);
                //$theId--;
                $statement->bindValue('theId', $theId);
                $statement->execute();
                //$statement->bindValue(1, $theId);
                //$statement->execute();
                // OR
                //$statement->execute([$theId]);

                $selectedSefer = $statement->fetch();
                if(empty($selectedSefer)) {
                    $error = "Couldn't find sefer {$theId}";
                }
            }
        }
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
?>