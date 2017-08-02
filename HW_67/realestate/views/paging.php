<?php include_once "utils/link.php" ?>
<div class = "text-center">
    <a class="btn btn-primary" href="<?= getLink(['pg'=>$pg-1]) ?>" 
        <?php if($pg < 1) echo "disabled" ?>
    >
        Previous
    </a>
    <a class="btn btn-primary" href="<?= getLink(['pg'=>$pg+1]) ?>">
        Next
    </a>
</div>