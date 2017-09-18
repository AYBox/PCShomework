<?php
require_once "utils/loggedinonly.php";

unset($_SESSION['username']);
if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
}
http_response_code(302);
header("Location: index.php?action=login");
exit;
?>