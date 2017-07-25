<?php
    include "../utils/db.php";
    try {
        if(! empty($deleteID)){
            $query = "DELETE FROM seforim WHERE id = :deleteID";
            $statement = $db->prepare($query);
            $statement->bindValue('deleteID', $deleteID);
            if(! $statement->execute() || $statement->rowCount() < 1)
                $deleteError = "Somethimg went wrong. Sefer $deleteID was not deleted.";
        }else if(isset($selectId)) {                
            $query = "SELECT id, name, price FROM seforim WHERE id = :selectId";
            $statement = $db->prepare($query);
            $statement->bindValue('selectId', $selectId);
            $statement->execute();
            $selectedSefer = $statement->fetch();
            if(empty($selectedSefer)) {
                $selectError = "Couldn't find sefer $selectId";
            }
        }
        
        $query = "SELECT id, name FROM seforim";
        $results = $db->query($query);
        $seforim = $results->fetchAll();
        $results->closeCursor();
    } catch (PDOException $e) {
        $errors = "Something went wrong " . $e->getMessage();
    }
?>