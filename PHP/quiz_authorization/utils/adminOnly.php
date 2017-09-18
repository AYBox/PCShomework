<?php
require_once "httpsonly.php";
//session_start();

if(!isset($_SESSION['admin'])) {
    $_SESSION['errors'][] = "Sorry only administrators can perform this action";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
}

?>