<?php
include "top.php";

if(!empty($errors)) : ?>
    <div class="alert alert-danger">
        <ul>
        <?php foreach($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
        </ul>
    </div>
<?php endif
?>

<form method="post">
  <div class="form-group">
    <label for="username">Username</label>
    <input class="form-control" id="username" name="username" aria-describedby="usernameHelp" placeholder="Enter username" value="<?= $username ?>">
    <small id="usernameHelp" class="form-text text-muted">Choose a user name. This will be the name other users see you as</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= $password ?>" minLength="8">
  </div>
  
  <button type="submit" class="btn btn-primary">Register</button>
</form>

<?php include "bottom.php" ?>