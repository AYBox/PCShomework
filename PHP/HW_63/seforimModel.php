<?php
    include "db.php";
    try {
        $query = "SELECT id, name FROM seforim";
        $results = $db->query($query);
        $seforim = $results->fetchAll();
        $results->closeCursor();
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
?>