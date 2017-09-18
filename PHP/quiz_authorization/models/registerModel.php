<?php 
require_once 'utils/autoload.php';
require_once "utils/httpsonly.php";

$username = '';
$password = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($_POST['username'])) {
        $username = $_POST['username'];
    }

    if(!empty($_POST['password'])) {
        $password = $_POST['password'];
        // should check for 8 chars here
    }

    if(!empty($username) && !empty($password)) {
        $db = Db::getDb();
        $query = "INSERT INTO users(username, password) VALUES(:username,:password)";
        $statement = $db->prepare($query);
        $statement->bindValue("username", $username);
        $statement->bindValue("password", password_hash($password, PASSWORD_DEFAULT));
        try {
            $statement->execute();
            http_response_code(302);
            header("Location: index.php?action=home");
            exit;
        } catch(PDOException $e){
            if($e->errorInfo[1] === 1062) {
                $errors[] = "Username already in use. Please choose another";
            } else {
                $errors[] = $e->getMessage();
            }
        }
    } else {
        $errors[] = "Username and password are required";
    }
}
?>