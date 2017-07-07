<?php
    $months=["January", "Feburary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    function optionGenerator($text){
        echo "<option>$text</option>";
    }
    function selectGenerator($name, $array){
        echo "<select class=\"form-control\" name=".$name.">";
        foreach($array as $arr){
            optionGenerator($arr);
        }
        echo "</select>";
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
<body class="container text-center">
    <div class="well">
        <h3>Find out how many days are in a specific month of a specific year.</h3>
    </div>
        <h3>Choose a month and enter a year:</h3>
    <form class="form-inline" action="processForm.php">
        <div class="form-group">
            <label for="month">Month</label>
            <?php selectGenerator("month", $months)?>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input class="form-control" type="number" name="year" id="year" required>
        </div>
        <button class="btn btn-default" type="submit">Calculate</button>
    </form>
</body>
</html>