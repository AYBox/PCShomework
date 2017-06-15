<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/bootstrap-3.3.7/css/bootstrap.min.css"/>

    <title>Document</title>
    <style>
        body{
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <?php
        $pres1 = "Donald Trump";
        $year1 = 2017;
        $pres2 = "Barack Obama";
        $year2 = 2009;
        $pres3 = "George Bush";
        $year3 = 2001;
    ?>
    <div class = "container">
        <div class="col-xs-6 col-md-4 col-lg-3">
            <table class= "table table-striped table-bordered table-hover">
                <caption class="text-center">First Year of Presidancy</caption>
                <thead>
                    <tr>
                        <th>President</th>
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $pres1 ?></td>
                        <td><?= $year1 ?></td>
                    </tr>
                    <tr>
                        <td><?= $pres2 ?></td>
                        <td><?= $year2 ?></td>
                    </tr>
                    <tr>
                        <td><?= $pres3 ?></td>
                        <td><?= $year3 ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>