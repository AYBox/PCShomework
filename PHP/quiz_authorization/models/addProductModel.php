<?php
require_once "utils/loggedInOnly.php";
require_once "utils/adminOnly.php";
require_once "utils/autoload.php";
$name="";
$description="";
$price="";
$url="";
//Sets variables with post values. Sets an error message for any missing values.
if(!empty($_POST['name'])){
    $name = $_POST['name'];
}else{
    $errors[] = "Name is a required field";
}
if(!empty($_POST['description'])){
    $description = $_POST['description'];
}else{
    $errors[] = "Description is a required field";
}
if(!empty($_POST['price'])){
    if(!is_numeric($_POST['price']) || $_POST['price']<=0){
        $errors[]="Price must be a numeric value greater than 0";
    }else{
        $price = $_POST['price'];
    }
}else{
    $errors[] = "Price is a required field";
}
if(!empty($_POST['url'])){
    $url = $_POST['url'];
}else{
    $errors[] = "Url is a required field";
}
if(!empty($errors)){
    $_SESSION['errors'] = $errors;
    header("Location: index.php?action=home&name=$name&description=$description&price=$price&url=$url");
    exit;
}

$query = "INSERT INTO items (name, description, price, url) VALUES (:name, :description, :price, :url)";
$db = Db::getDb();

try{
    $statement = $db->prepare($query);
    $statement->bindValue('name', $name);
    $statement->bindValue('description', $description);
    $statement->bindValue('price', $price);
    $statement->bindValue('url', $url);
    $statement->execute();            
} catch (PDOException $e) {
    $_SESSION['errors'][] = "Something went wrong " . $e->getMessage();
}
header("Location: index.php?action=home");
?>