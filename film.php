<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Film</title>
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
    <div class="btn_add"><a href="new_film.php">Add</a></div>
    <table class="table_class">
        <thead>
            <tr>
                <th>Poster  </th>
                <th>Title</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Duration</th>
                <th>Ratings</th>
                <th>Rent</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            require "config.php";
            $query = mysqli_query($db, "SELECT * FROM films INNER JOIN appendix ON films.id_films=appendix.id_films");
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><img width="150px" src="images/<?=$row['file']?>" alt="<?=$row['file']?>"></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['year'] ?></td>
                    <td><?= $row['genre'] ?></td>
                    <td><?= $row['duration'] ?></td>
                    <td><?= $row['ratings'] ?></td>
                    <td><?= $row['rent'] ?></td>
                    <td class="Edit_film">
                        <a href="edit_film.php?id=<?=$row['id_films']?>">Edit</a>
                    <td class="Hapus_film">
                        <a href="delete_film.php?id=<?=$row['id_films']?>">Delete</a>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>