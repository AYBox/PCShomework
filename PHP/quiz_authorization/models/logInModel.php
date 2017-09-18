<?php
require_once "utils/httpsonly.php";
require_once "utils/autoload.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(!empty($_POST['username'])){
        $username = $_POST['username'];
        if(!empty($_POST['password'])){
            $password = $_POST['password'];
        }else{
            $errors[]="Please enter Password";
        }
    } else {
        $errors[]="Please enter Username & Password";
    }
    if(!isset($errors)){
        $userPassword = $_POST['password'];
        $db = Db::getDb();
        $query = "SELECT password, admin FROM users WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindValue("username", $username);
        try {
            $statement->execute();
            $results = $statement->fetch(PDO::FETCH_ASSOC);
            $hash = $results['password'];
            $admin = $results['admin'];
            if(password_verify($password, $hash)) {
                $_SESSION['username'] = $username;
                if($admin == 1){
                    $_SESSION['admin'] = true;
                }
            
                if(!empty($_SESSION['returnTo'])) {
                    $url = $_SESSION['returnTo'];
                    unset($_SESSION['returnTo']);
                } else {
                    $url = "index.php?action=home";
                }
                http_response_code(302);
                header("Location: $url");
                exit;
            }
        $errors[] = "Username and password did not match our records. Please try again";
        } catch(PDOException $e){
            $errors[] = $e->getMessage();
        }
    }
}

?>