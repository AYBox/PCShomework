<?php

if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== "on") {
    http_response_code(302);
    header("Location: https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");
    exit;
}

?>