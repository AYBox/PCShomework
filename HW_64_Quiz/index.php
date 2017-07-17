<?php
    $cs = "mysql:host=localhost;dbname=test";
    $user = "test";
    $password = 'password';

    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $db = new PDO($cs, $user, $password, $options);
       
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $query = "DELETE FROM students WHERE name = :name";
            $statement = $db->prepare($query);
            $statement->bindValue('name', $name);
            $statement->execute();
        }

        $query = "SELECT DISTINCT name FROM students";
        $results = $db->query($query);
        $students = $results->fetchall(PDO::FETCH_COLUMN);
        foreach($students as $student){
            $query = "SELECT grade FROM students WHERE name = '$student'";
            $results = $db->query($query);
            $grades[$student] = $results->fetchall(PDO::FETCH_COLUMN);
        }
        $results->closeCursor();
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
    <div class="jumbotron">
        <h1 class="text-center">Student Grades</h1>
    </div>
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
                    <td><?= $student ?></td>
                    <td><?= $grades[$student]['0'] ?></td>
                    <td><?= $grades[$student]['1'] ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="name" value="<?= $student ?>">
                            <button type="submit" >Delete Student</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>