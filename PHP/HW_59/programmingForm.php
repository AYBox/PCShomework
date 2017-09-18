<?php
    $languages = ["Java", "HTML", "PHP", "JavaScript"];
    $name = "";
    $years = "";
    $favorites = [];
    
    if(!empty($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $errors[] = "NAME IS REQUIRED";
    }

    # if(isset($_POST['years'])) { // empty would return TRUE
    if(isset($_POST['years']) && $_POST['years']!="") { // empty returns FALSE
        if(!is_numeric($_POST['years']) || $_POST['years'] < 1 || $_POST['years'] > 50) {
            $errors[] = "YEARS MUST BE A VALID NUMBER BETWEEN 1 AND 50";
        } else {
            $years = $_POST['years'];
        }
    } else {
        $errors[] = "YEARS IS REQUIRED";
    }

    /*if(!empty($_POST['favorite'])) {
        if(in_array($_POST['favorite'] , $languages)) {
        $favorite = $_POST['favorite'];
        } else {
            $errors[] = "YOU ENTERED AN INVALID LANGUAGE";
        }
    } else {
        $errors[] = "FAVORITE PROGRAMMING LANGUAGE IS REQUIRED";
    }*/

    if(!empty($_POST['favorite'])) {
        $favorites = explode(",", $_POST['favorite']);
        foreach($favorites as $favorite){
            if(!in_array(trim($favorite), $languages)){
                $errors[] = "YOU ENTERED AN INVALID LANGUAGE";
                $favorites = [];
                break;
            }
        }
    } else {
        $errors[] = "FAVORITE PROGRAMMING LANGUAGE IS REQUIRED";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center"><h1>Coding Form</h1></div>
        <?php if($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($errors)) :?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach($errors as $error) echo "<li>$error</li>" ?>
                </ul>
            </div>
        <?php elseif($_SERVER['REQUEST_METHOD'] === 'POST') :?>
            <div class="alert alert-success">
                <p>Thank you for submitting your data</p>
            </div>
        <?php endif ?>
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?= $name ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="years" class="col-sm-2 control-label">Number of Years Coding</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" id="years" placeholder="Number of Years Coding" name="years" value="<?= $years ?>" min="1" max="50" required>
                </div>
            </div>
            <div class="form-group">
                <label for="favorite" class="col-sm-2 control-label">Favorite Programming Language</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="favorite" placeholder=
                    "Choose one or more seperrated by comma(s): <?php
                        $count=count($languages);
                        echo $languages[0];
                        for($i=1; $i<$count; $i++){
                            echo ", $languages[$i]";
                        }
                    ?>" 
                    name="favorite"
                value="<?php 
                            $count=count($favorites);
                            if($count>0){
                                echo $favorites[0];
                                for($i=1; $i<$count; $i++){
                                    echo ", $favorites[$i]";
                                }
                            }
                        ?>"
                required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>