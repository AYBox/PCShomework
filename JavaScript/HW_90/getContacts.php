<?php
header("Access-Control-Allow-Origin: http://localhost:8080");
require 'db.php';

$query = "SELECT * FROM contacts";
$stmt = $db->query($query);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($rows);
echo json_encode($rows);
?>