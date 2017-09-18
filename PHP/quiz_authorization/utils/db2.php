<?php
$cs = "mysql:host=localhost;dbname=seforim_store";
print_r($cs);
echo "<br>";
try {
    $db = new PDO($cs, "test", "1234");
} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
}
print_r($db);
?>