<?php
    $cs = "mysql:host=localhost;dbname=test";
    $user = "test";
    $password = 'password';

    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
       
        echo "isset".isset($_POST['name'])."<br>";
        if(isset($_POST['name'])){
            //$statement = "DELETE FROM students WHERE NAME = :name";
            $delete = "DELETE FROM students WHERE NAME = '{$_POST['name']}'";
            //$statement
            echo $delete;
            $rowsDeleted = $db->exec($delete);
        }

        $query = "SELECT DISTINCT name FROM students";
        $results = $db->query($query);
        $students = $results->fetchall(PDO::FETCH_ASSOC);
        print_r($students);
        foreach($students as $student){
            echo $student['name']."<br>";
        }
        foreach($students as $student){
            echo $student['name']."<br>";
            $query = "SELECT grade FROM students WHERE name = '{$student['name']}'";
            echo $query."<br>";
            echo $student['name']."<br>";
            $results = $db->query($query);
            echo $student['name']."<br>";
            $grades[$student['name']] = $results->fetchall(PDO::FETCH_ASSOC);
            echo $student['name']."<br>";
        }
        $results->closeCursor();
        print_r($grades);
    } catch (PDOException $e) {
        $error = "Something went wrong " . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="container">
    <table class="table table-striped table-bordered">
        <thead>
            <th>Name</th>
            <th>Grade1</th>
            <th>Grade2</th>
            <th>Delete</th>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['name'] ?></td>
                    <td><?= $grades[$student['name']]['0']['grade'] ?></td>
                    <td><?= $grades[$student['name']]['1']['grade'] ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="name" value="<?= $student['name'] ?>">
                            <button type="submit" >Delete Student</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>