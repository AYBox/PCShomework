<?php
    if(!empty($_POST)){
        if(!empty($_POST['userName'])){
            $userName = $_POST['userName'];
        }
        if(!empty($_POST['password'])){
            $userPasswordHashed = password_hash($_POST['password']);
        }
    }

?>