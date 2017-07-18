<?php
    if($_SERVER['REQUEST_METHOD']==='POST')
        {
            if(empty($_POST['name'])){
                $errors[]="Sefer Name is a required field";
            }else{
                $name = $_POST['name'];
            }
            if(isset($_POST['price'])) $price = $_POST['price'];
            if(empty($_POST['price'])){
                $errors[]="Price is a required field";
            }elseif(!is_numeric($_POST['price']) || $_POST['price']<=0){
                $errors[]="Price must be a numeric value greater than 0";
            }
            if(empty($errors)){
                $query = "INSERT INTO `seforim`(`name`, `price`) VALUES (:name, :price)";
                include "db.php";
                try{
                    $statement = $db->prepare($query);
                    $statement->bindValue('name', $name);
                    $statement->bindValue('price', $price);
                    $success = $statement->execute();
                    if($success){
                        $query = "SELECT * FROM seforim WHERE name = :name AND price = :price";
                        $statement = $db->prepare($query);
                        $statement->bindValue('name', $name);
                        $statement->bindValue('price', $price);
                        $statement->execute();
                        $selectedSefer = $statement->fetch();
                    }                
                } catch (PDOException $e) {
                    $error = "Something went wrong " . $e->getMessage();
                }
            }        
        }

    include "top.php"
?>
    
<form method="post" class="form-horizontal">
<h3 class="text-center">Enter sefer info to add sefer to database</h3>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Sefer Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" required <?php if(isset($errors) && !empty($name)) echo "value = $name" ?>>
        </div>
    </div>
    <div class="form-group">    
        <label for="price" class="col-sm-2 control-label">Price</label>
        <div class="col-sm-10">
            <input type="number" step=".01" class="form-control" id="price" name="price" required <?php if(isset($errors) && !empty($price)) echo "value = $price" ?>>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Add Sefer</button>
        </div>
    </div>
</form>
<?php if(isset($selectedSefer)): ?>
    <div class="alert alert-success">
        Submision succesful!<br>
        id: <?=$selectedSefer['id'] ?><br>
        name: <?=$selectedSefer['name'] ?><br>
        price: <?=$selectedSefer['price'] ?><br>
    </div>
<?php elseif(isset($errors)): ?>
        <div class="alert alert-danger">
            Submision failed!<br>
            <ul>
                <?php 
                    foreach($errors as $error) echo "<li>$error</li>"
                ?>
            </ul>
        </div>
<?php endif ?>
<?php
    include "bottom.php"
?>