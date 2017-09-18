<?php include "views/top.php"; ?>
<div class="row">
    <?php if(!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>
    <div class="well">
        <form class="form-horizontal" method="post">
            <h1 class="text-center">Log In</h1>
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" name="username" <?php if(!empty($username)) echo "value=\"$username\"" ?> >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Log In</button>
        </form>
    </div>
</div>

<?php include "views/bottom.php" ?>