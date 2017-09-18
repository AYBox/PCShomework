<?php
    $styles[] = "
        img{
            height:100px
        }
    ";
    include "top.php";
    if(!empty($errors)):
?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>
<?php endif ?>
<form class="well" action="index.php?action=processAddProduct" method="post">
    <h3 class="text-center">Add a Product</h3>
    <div class="form-group">
        <label for="name">Name</label>
        <input
            class="form-control" type="text" id="name" name="name"
            <?php
                if(!empty($_GET['name'])) echo "value = \"{$_GET['name']}\""
            ?>
        >
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input
            class="form-control" type="text" id="description" name="description"
            <?php
                if(!empty($_GET['description'])) echo "value = \"{$_GET['description']}\""
            ?>
        >
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input
            class="form-control" type="number" step=".01" id="price" name="price"
            <?php
                if(!empty($_GET['price'])) echo "value = \"{$_GET['price']}\""
            ?>
        >
    </div>
    <div class="form-group">
        <label for="url">Url</label>
        <input
            class="form-control" type="text" id="url" name="url"
            <?php
                if(!empty($_GET['url'])) echo "value = \"{$_GET['url']}\""
            ?>
        >
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>
<table class="table table-striped table-highlight">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($productInfoArray as $productInfo): ?>
                <tr>
                    <td><?= $productInfo['name'] ?></td>
                    <td><?= $productInfo['description'] ?></td>
                    <td><?='$' . $productInfo['price'] ?></td>
                    <td><img src=<?= $productInfo['url'] ?> alt="product image"></td>
                </tr>
            <?php endforeach ?>
        </tbody>
</table>
<?php include "bottom.php" ?>