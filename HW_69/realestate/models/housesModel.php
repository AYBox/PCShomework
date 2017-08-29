<?php
include 'utils/Database.php';

if (empty($zip)) {
    $zip = '';
}

if (empty($min)) {
    $min = '';
}

if (empty($max)) {
    $max = '';
}

if (empty($pg)) {
    $pg = 0;
}
$limitStart = ($pg * 4);
$numListings = 4;

try {
    $query = "SELECT * FROM houses WHERE (:zip = '' OR zip=:zip)
                                    AND (:min = '' OR price >= :min)
                                    AND (:max = '' OR price <= :max)
                                    LIMIT :ls, :nl";
    $db = Database::getInstance();
    $statement = $db->getDb()->prepare($query);
    $statement->bindValue('zip', $zip);
    $statement->bindValue('min', $min);
    $statement->bindValue('max', $max);
    $statement->bindValue('ls', $limitStart, PDO::PARAM_INT);
    $statement->bindValue('nl', $numListings, PDO::PARAM_INT);
    $statement->execute();
    $houses = $statement->fetchAll();
    $statement->bindValue('ls', $limitStart + 4, PDO::PARAM_INT);
    $statement->bindValue('nl', 1, PDO::PARAM_INT);
    $statement->execute();
    if(empty($statement->fetch()))
        $noMoreResults = true;
    $statement->closeCursor();
} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
}
?>