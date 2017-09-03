<?php
    $styles[] = "
        .itemTitle{
            padding-bottom: 15px;
        }
        .selectQtyDiv{
            padding-left: 2px;
        }
        .lblQtyDiv{
            padding-right: 2px;
            padding-top: 7px;
        }
        .btn{
            margin: 15px;
        }
    ";
    include "top.php";
?>
<div class="row">
    <a class="btn btn-primary pull-right" href="index.php?action=cart">View Cart</a>
</div>
<div class="row">
    <?php foreach($items as $item): ?>
        <div class="text-center well col-sm-4 col-lg-3 col-xl-2">
            <form class="form-horizontal" method="post">
                <h3 class="itemTitle"><?= $item ?></h3>
                <input type="text" name="item" value="<?= $item ?>" hidden>
                <div class="form-group">
                    <div class="lblQtyDiv text-right col-sm-5">
                        <label for="qty">Qty:</label>
                    </div>
                    <div class="selectQtyDiv col-sm-4">
                        <select class="form-control" id="qty" name="qty">
                            <option value="1" selected>1</option>
                            <?php for($i=2; $i<=30; $i++): ?>
                                <option value="<?=$i?>"><?=$i?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-default" type="submit">Add to Cart</button>
                </div>
            </form>
        </div>
    <?php endforeach ?>
</div>
<?php
    include "bottom.php"
?>