<?php
    $color="black";
    $fontFamily="cooper";
    if(!empty($_GET["color"]))
        $color= urldecode(($_GET["color"]));
    if(!empty($_GET["font-family"]))
        $fontFamily=urldecode(($_GET["font-family"]));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        article{
            color:<?=$color?>;
            font-family:<?=$fontFamily?>;
        }
        body{
            width:80%;
            margin: 0 auto;
            padding: 2em 0;
        }
        nav, footer{
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color:black;
            height:2em;
            position: fixed;
            width: 100%;
            left:0;
            color: #B3A7EE;
        }
        nav{
            top:0;
        }
        footer{
            bottom:0;
        }
        nav ul, footer p{
            width: 80%;
            margin: 0 auto;
            padding: 0;
        }
        nav li{
            display: inline-block;
            list-style-type: none;
        }
        nav a{
            color: #B3A7EE;
            font-size: 1.25em;
            margin-right: 1.25em;
            text-decoration: none;
        }
        h1{
            text-transform: uppercase;
            font-weight: bold;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="page2.php">Page 2</a></li>
            <li><a href="page3.php">Page 3</a></li>
        </ul>
    </nav>    