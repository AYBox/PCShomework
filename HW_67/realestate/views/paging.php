<div class = "text-center">
    <a href="<?= getLink(['pg'=>$pg-1]) ?>">
        <button <?php if($pg < 1) echo "disabled" ?> class="btn">Previous</button>
    </a>
    <a href="<?= getLink(['pg'=>$pg+1]) ?>">
        <button class="btn">Next</button>
    </a>
</div>