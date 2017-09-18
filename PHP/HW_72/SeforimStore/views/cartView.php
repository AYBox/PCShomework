<?php
    $cartItems = $cart->getItems();
    $styles[] = "
        .btn{
            margin:15px;
        }  
    ";
    include "top.php";
?>
<div class="row">
    <form method="post">
        <button type="submit" name="clearCart" class="btn btn-primary pull-right">Clear Cart</button>
    </form>
</div>
<div class="row">
    <?php 
        if(!empty($cartItems)):
    ?>
    <table class="table table-striped table-hover">
        <theader>
            <tr>
                <th>Item</th>
                <th>Qty</th>
            </tr>
        </theader>
        <tbody>
            <?php foreach($cartItems as $item => $qty): ?>
                <tr>
                    <td><?= $item ?></td>
                    <td><?= $qty ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
        <tfooter>
        
        </tfooter>
    </table>
    <?php 
        else:
    ?>
    <div>
        <h3>Cart is empty!</h3>
    </div>
    <?php endif; ?>
</div>
<?php
    include "bottom.php";
?>