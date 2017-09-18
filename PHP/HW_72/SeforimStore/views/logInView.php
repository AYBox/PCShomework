<?php include "views/top.php" ?>

<div class="row">
    <div class="well col-md-5">
        <form class="form-horizontal" method="post">
            <h1 class="text-center">Register</h1>
            <div class="form-group">
                <label for="userName">Create User Name</label>
                <input id="userName" name="userName">
            </div>
            <div class="form-group">
                <label for="password">Create Password</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>

<?php include "views/bottom.php" ?>