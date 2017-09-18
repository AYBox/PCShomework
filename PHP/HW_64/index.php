<?php
    include "db.php";
    try {
        if(isset($_POST['sefer'])){
            $deleteID = $_POST['sefer'];
            $query = "DELETE FROM seforim WHERE id = :deleteID";
            $statement = $db->prepare($query);
            $statement->bindValue('deleteID', $deleteID);
            if(! $statement->execute() || $statement->rowCount() < 1)
                $deleteError = "Somethimg went wrong. Delete unsuccesful.";
        }else if(isset($_GET["sefer"])) {
            if(empty($_GET["sefer"] || !is_numeric($_GET["sefer"]))) {
                $error = "A valid sefer id must be submitted";
            } else {
                $theId = $_GET['sefer'];
                
                $query = "SELECT id, name, price FROM seforim WHERE id = :theId";
                $statement = $db->prepare($query);
                $statement->bindValue('theId', $theId);
                $statement->execute();
                $selectedSefer = $statement->fetch();
                if(empty($selectedSefer)) {
                    $error = "Couldn't find sefer {$theId}";
                }
            }
        }
        $query = "SELECT id, name FROM seforim";
        $results = $db->query($query);
        $seforim = $results->fetchAll();
        $results->closeCursor();
    } catch (PDOException $e) {
        $errors = "Something went wrong " . $e->getMessage();
    }
    include "top.php";
?>
    <form class="form-horizontal">
        <div class="form-group">
            <label for="sefer" class="col-sm-2 control-label">Select A Sefer</label>
            <div class="col-sm-10">
                <select class="form-control" id="sefer" name="sefer">
                    <?php foreach($seforim as $sefer) :?>
                        <option value="<?= $sefer['id'] ?>"
                        <?php if (!empty($selectedSefer) && $sefer['id'] == $selectedSefer['id']) echo "selected" ?>
                        ><?= $sefer["name"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Get Info</button>
            </div>
        </div>
    </form>

    <?php if(!empty($selectedSefer)) : ?>
        <h2 class="text-center">
            <?= $selectedSefer['name'] ?> is $<?= number_format($selectedSefer['price'], 2) ?>
        </h2>
    <?php endif ?>

    <?php if(!empty($error)) : ?>
        <h2 class="text-center alert alert-danger">
            <?= $error ?>
        </h2>
    <?php endif ?>
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <label for="sefer" class="col-sm-2 control-label">Select A Sefer To Delete</label>
            <div class="col-sm-10">
            <select class="form-control" id="sefer" name="sefer">
                    <?php foreach($seforim as $sefer) :?>
                        <option value="<?= $sefer['id'] ?>">
                            <?= $sefer["name"] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </form>
    <?php if(!empty($deleteError)) : ?>
        <h2 class="text-center alert alert-danger">
            <?= $deleteError ?>
        </h2>
    <?php elseif(!empty($deleteID)) :?>
        <h2 class="text-center text-success">Sefer successfully deleted</h2>
    <?php
    endif; 
include 'bottom.php'
?>