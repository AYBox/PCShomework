<?php
require_once "httpsonly.php";
//session_start();

if(!isset($_SESSION['username'])) {
    $_SESSION['returnTo'] = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    header("Location: index.php?action=login");
    exit;
}

?>