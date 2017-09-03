<?php
    $isFirstVisit = true;
    if(!empty($_COOKIE["timeOfVisit"])){
        $isFirstVisit = false;
        $timeOfLastVisit = $_COOKIE["timeOfVisit"];
        $formattedTOLV = date('m/d/Y \a\t h:i:s a', $timeOfLastVisit);
    }
    setcookie("timeOfVisit", time())
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body{
        text-align:center;
    }
    </style>
</head>
<body>
    <h1>Homework 71</h1>
    <div>
    <?php if($isFirstVisit == true)
        echo "Welcome! This is your first time here today.";
    else
        echo "Your last visit was on $formattedTOLV";
    ?>
    </div>
</body>
</html>