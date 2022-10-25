<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posttest 5</title>
    <link rel="stylesheet" href="stylesheet/style.css">
</head>

<body>
    <nav>
        <div class="nav_container">
            <ul class="nav_items">
                <li><a href="index.php">Home</a></li>
                <li><a href="film.php">Film List</a></li>
                <li><a href="rented.php">Rented List</a></li>
            </ul>
        </div>
    </nav>
    <table class="table_class">
        <thead>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Duration</th>
                <th>Ratings</th>
                <th>Rent</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require "config.php";
            $query = mysqli_query($db, "SELECT * FROM films");
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['year'] ?></td>
                    <td><?= $row['genre'] ?></td>
                    <td><?= $row['duration'] ?></td>
                    <td><?= $row['ratings'] ?></td>
                    <td><?= $row['rent'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>