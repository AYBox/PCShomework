<?php
    $name= $_POST['name'];
    $email= $_POST['email'];
    $age= $_POST['age'];
    $rating= $_POST['rating'];

    if(empty($name)){
        $errors[]="Name is a required field";
    }
    if(empty($email)){
        $errors[]="Email is a required field";
    }
    if(empty($age)){
        $errors[]="Age is a required field";
    }elseif($age < 0 || $age > 120){
        $errors[]="Age must be between 0-120";
    }
    if(!empty($rating) && ($rating < 1 || $rating > 10)){
        $errors[]="Rating must be between 1-10";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /*.well:first-of-type {
            background-color: transparent;
            border: none;
            box-shadow: none;
        }*/
    </style>

    <title>Form Submision</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron text-center">
            <h1>Your Submision</h1>
        </div>
        <form class="form-horizontal" action="form.php" method="post">
            <?php if(isset($errors)){ ?>
            <div class="well text-danger">
                        <ul>
                            <?php foreach($errors as $error){ ?>
                                <li><?= $error ?></li>
                            <?php } ?>
                        </ul>
            </div>
            <br>
            <?php }
            
            else{ ?>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                    <input type="name" class="form-control" id="name" placeholder="your name" name="name" value="<?= $name ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="your email" name="email" value="<?= $email ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="age" class="col-sm-2 control-label">Age</label>
                    <div class="col-sm-10">
                    <input type="number" class="form-control" id="age" placeholder="age" name="age" value="<?= $age ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="rating" class="col-sm-2 control-label">Rating</label>
                    <div class="col-sm-10">
                    <input type="number"  class="form-control" id="rating" name="rating" value="<?= $rating ?>">
                    </div>
                </div>
            <?php } ?>
        </form>
    </div>
</body>
</html>