<?php
    include 'utils/Database.php';

    if (! empty($houseId)) {
        try {
            $query = "SELECT * FROM houses WHERE id = :id";
            $db = Database::getInstance();
            $statement = $db->getDb()->prepare($query);
            $statement->bindValue('id', $houseId);
            $statement->execute();
            $house = $statement->fetch(PDO::FETCH_ASSOC);
            if (empty($house)) {
                $error = "Unable to find house $houseId";
            }
        } catch(PDOException $e) {
            $error = "Something went wrong " . $e->getMessage();
        }
    } else {
        $error = "No house id set to find";
    }
?>