<?php
    
    $cs = "mysql:host=localhost;dbname=seforim";
    $user = "test";
    $password = 'password';

    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);

        $query = "SELECT * FROM seforim";

        $results = $db->query($query);
        $allSeforimRS = $results->fetchAll();
        $results->closeCursor();

        if(isset($_GET['name'])){
            if(empty($_GET['name']))
                $error = "You have not selected any sefer";
            else{
                $selectedSefer=$_GET['name'];
                $query = "SELECT * FROM seforim WHERE name=\"$selectedSefer\"";
                $results = $db->query($query);
                $selectedSeferRow = $results->fetch();
                $results->closeCursor();
                if(empty($selectedSeferRow))
                    $error="We have no info for a sefer with the name \"$selectedSefer\"";
            }
    }
    } catch(PDOException $e) {
        die("Something went wrong " . $e->getMessage());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        body{
            width: 80%;
            margin: 0 auto;
        }
        header{
            display: flex;
            background-color: lightblue;
            height: 150px;
            flex-direction: column;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        header h1{
            font-size: 3em;
        }
    </style>

    <title>Price Checker</title>
</head>
<body>
    <header>
        <h1>Seforim Price Checker</h1>
    </header>
    <form>
        <p>
            To find the price of a sefer,<br>
            select a sefer from the drop-down<br>
            and click "Check Price"
        </p>
        <select name="name">
            <?php foreach($allSeforimRS as $sefer): ?>
                <option <?php if(isset($selectedSeferRow['name']) && $selectedSeferRow['name']===$sefer['name']) echo "selected" ?> > 
                    <?= $sefer['name'] ?>
                </option> 
            <?php endforeach ?>
        </select>
    <input type="submit" value="Check Price">
    </form>
    <?php
        if(!empty($selectedSeferRow)):
    ?>
    <div>
        <p>Name of Sefer: <?= $selectedSeferRow['name'] ?></p>
        <p>Price: $<?php printf("%.2f", $selectedSeferRow['price']) ?></p>
    </div>
    <?php
        endif
    ?>
    <?php
        if(!empty($error)) echo "<p>$error</p>";
    ?>
</body>
</html>