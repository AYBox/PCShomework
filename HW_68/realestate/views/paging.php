<?php 
    include_once "utils/link.php";
    if (empty($pg)) {
        $pg = 0;
    }
?>
<div class = "text-center">
    <a class="btn btn-primary" 
        <?php
            if($pg > 0){
                echo "href=\"" . getLink(['pg'=>$pg-1]) ."\"";
            }else{
                echo "disabled";
            }
        ?>
    >
        Previous
    </a>
    <a class="btn btn-primary"
        <?php
            if(!isset($noMoreResults)){
                echo "href=\"" . getLink(['pg'=>$pg+1]) ."\"";
            }else{
                echo "disabled";
            }
        ?>
    >
        Next
    </a>
</div>