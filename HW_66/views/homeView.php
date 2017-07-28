
<?php
    include "top.php";
?>
    <?php if(!empty($actionError)) : ?>
        <h2 class="text-center alert alert-danger">
            <?= $actionError ?>
        </h2>
    <?php endif ?>
    <div class="row">
        <div class="col-md-3">
            <h4>Category</h4>
        </div>
        <div class="col-md-9">
            <div class="row">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="sefer" class="col-sm-3 control-label">Select A Sefer</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="sefer" name="sefer">
                                <?php foreach($seforim as $sefer) :?>
                                    <option value="<?= $sefer['id'] ?>"
                                    <?php if (!empty($selectedSefer) && $sefer['id'] == $selectedSefer['id']) echo "selected" ?>
                                    ><?= $sefer["name"] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="action" value="home">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary">Get Info</button>
                        </div>
                    </div>
                </form>

    <?php if(!empty($selectedSefer)) : ?>
        <h2 class="text-center">
            <?= $selectedSefer['name'] ?> is $<?= number_format($selectedSefer['price'], 2) ?>
        </h2>
    <?php endif ?>

    <?php if(!empty($selectError)) : ?>
        <h2 class="text-center alert alert-danger">
            <?= $selectError ?>
        </h2>
    <?php endif ?>
    <form class="form-horizontal" method="post" action="index.php?action=home">
        <div class="form-group">
            <label for="sefer" class="col-sm-3 control-label">Select A Sefer To Delete</label>
            <div class="col-sm-9">
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
            <div class="col-sm-offset-3 col-sm-10">
            <button type="submit" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </form>
    <?php if(!empty($deleteError)) : ?>
        <h2 class="text-center alert alert-danger">
            <?= $deleteError ?>
        </h2>
    <?php elseif(!empty($deleteID)) :?>
        <h2 class="text-center text-success">Sefer <?= $deleteID ?> successfully deleted</h2>
    <?php endif ?>
    
            </div>
        </div>
    </div>
<?php
include 'bottom.php'
?>