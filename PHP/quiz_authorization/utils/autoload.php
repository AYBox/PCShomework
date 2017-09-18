<?php
spl_autoload_register(function ($className) {
    require lcfirst($className) . '.php';
});
?>