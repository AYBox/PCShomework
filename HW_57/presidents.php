<?php
    $president1 = ["Donald J Trump", "2017-"];
    $president2 = ["Barack H Obama", "2009-2016"];
    $president3 = ["George W Bush", "2001-2008"];

    $presidents = [$president1, $president2, $president3];

    $presidents2 = array(
        ["name" => "Donald J Trump", "years" => "2017-", "age" => 70],
        ["name" => "Barack H Obama", "years" => "2009-2016", "age" => 55],
        ["name" => "George W Bush", "years" => "2001-2008", "age" => 59]
    );
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>presidents</title>
    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="jumbotron">
            <h1>US Presidents</h1>
        </div>

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>President</th>
                    <th>Years in office</th>
                </tr>
            </thead>
            <tbody>
                <tr><td> <?=$presidents[0][0] ?> </td><td> <?=$presidents[0][1]?> </td></tr>
                <tr><td> <?=$presidents[1][0]?> </td><td> <?=$presidents[1][1]?> </td></tr>
                <tr><td> <?=$presidents[2][0]?> </td><td> <?=$presidents[2][1]?> </td></tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>President</th>
                    <th>Years in office</th>
                </tr>
            </thead>
            <tbody>
                <tr><td> <?=$presidents2[0]["name"] ?> </td><td> <?=$presidents2[0]["years"]?> </td></tr>
                <tr><td> <?=$presidents2[1]["name"]?> </td><td> <?=$presidents2[1]["years"]?> </td></tr>
                <tr><td> <?=$presidents2[2]["name"]?> </td><td> <?=$presidents2[2]["years"]?> </td></tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <?php
                        foreach($presidents2[0] as $key=>$value){
                            echo "<th>$key</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($presidents2 as $president){
                        foreach($president as $value){
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="/jquery-1.12.4.min.js"></script>
    <script src="/bootstrap-3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>