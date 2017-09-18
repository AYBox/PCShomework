<?php
    $months=["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    if(empty($_GET['month']))
        $errors[]="You forgot to choose a month";
    elseif(!in_array($_GET['month'], $months))
        $errors[]="<strong>".$_GET['month']."</strong>"." is not a month or is misspelled";
    else
        $month=$_GET['month'];
    
    if(empty($_GET['year']))
        $errors[]="You forgot to enter a year";
    elseif(!is_numeric($_GET['year']))
        $errors[]="<strong>".$_GET['year']."</strong>"." is not a year";
    else
        $year=$_GET['year'];
    
    function isLeapYear($year){
        return ((($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0));
    }
    function daysInMonth($month, $year){
        $daysInMonths=[
        "January"=>"31",
        "March"=>"31",
        "April"=>"30",
        "May"=>"31",
        "June"=>"30",
        "July"=>"31",
        "August"=>"31",
        "September"=>"30",
        "October"=>"31",
        "November"=>"30",
        "December"=>"31"
        ];
        if($month=="February"){
            if(isLeapYear($year)){
                return "29";
            }else{
                return "28";
            }
        }else{
            return $daysInMonths[$month];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/bootstrap-3.3.7/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body class="container">
    <?php if(isset($errors)):?>
        <div class="alert alert-danger">
            <p>Your input is invalid for the following reason(s):</p>
            <ul>
                <?php foreach($errors as $error) echo "<li>$error</li>"?>
            </ul>
        </div>
    <?php else: ?>
        <div class="jumbotron text-center">
            <h2>Here is the answer:</h2>
        </div>
        <div class="well text-center">
            There are <strong><?=daysInMonth($month, $year)?></strong> days in the month of <strong><?=$month?></strong> of <strong><?=$year?></strong>
        </div>
    <?php endif ?>
</body>
</html>