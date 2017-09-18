<?php
if(! empty($_GET["zip"])) {
    $zip = $_GET["zip"];
}

if(! empty($_GET["min"])) {
    if(!is_numeric($_GET["min"])) {
        $errors[] = "min must be a number";
    } else {
        $min = $_GET["min"];
    }
}

if(! empty($_GET["max"])) {
    if(!is_numeric($_GET["max"])) {
        $errors[] = "max must be a number";
    } else {
        $max = $_GET["max"];
    }
}

if(! empty($_GET["pg"])) {
    if(!is_numeric($_GET["pg"]) || $_GET["pg"] < 0) {
        $errors[] = "pg must be a number";
    } else {
        $pg = $_GET["pg"];
    }
}
?>