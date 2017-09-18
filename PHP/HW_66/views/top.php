<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seforim Store</title>

    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 45px;
        }
        <?php if (!empty($styles)) echo $styles ?>
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?action=home">Home</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php?action=home">Sefer Info</a></li>
                <li><a href="index.php?action=home">Delete Sefer</a></li>
                <li><a href="index.php?action=addSefer">Add Sefer</a></li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron">
        <div class="container text-center">
            <h1>Seforim Store</h1>
        </div>
    </div>
    <div class="container">