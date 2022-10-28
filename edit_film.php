<?php
require "config.php";

if (isset($_GET['id'])) {
    $query = mysqli_query($db, "SELECT * FROM films INNER JOIN appendix ON films.id_films = appendix.id_films WHERE films.id_films = '$_GET[id]'");
    $result = mysqli_fetch_array($query);
    $title = $result['title'];
    $year = $result['year'];
    $genre = $result['genre'];
    $duration = $result['duration'];
    $ratings = $result['ratings'];
    $rent = $result['rent'];
    $file_name = $result['file_name'];
    $file = $result['file'];
}

if (isset($_POST['submit'])) {
    $query = mysqli_query($db, "SELECT * FROM films");
    $result = mysqli_fetch_array($query);
    $idFilms = $result['id_films'];
    $title = htmlspecialchars($_POST['title_film']);
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $duration = $_POST['duration'];
    $ratings = $_POST['ratings'];
    $rent = $_POST['rent'];
    $old_picture = $_POST['old_picture'];
    date_default_timezone_set("Asia/Makassar");
    $time = strtotime("now");
    $date = date("Y-m-d H:i:s", $time);
    $query_films = mysqli_query($db, "UPDATE films SET title = '$title', year = '$year', genre = '$genre', duration = '$duration', ratings = '$ratings', rent = '$rent' WHERE id_films = $idFilms");
    if (!empty($_FILES['picture']['name'])) {
        unlink('images/' . $old_picture);
        $query = mysqli_query($db, "SELECT * FROM films WHERE title = '$title'");
        $result = mysqli_fetch_assoc($query);
        $idFilm = $result['id_films'];
        $name = htmlspecialchars($_POST['picture_name']);
        $picture = htmlspecialchars($_FILES['picture']['name']);
        $x = explode('.', $picture);
        $extension = strtolower(end($x));
        $new_picture = "$name.$extension";
        $tmp = $_FILES['picture']['tmp_name'];
        move_uploaded_file($tmp, "images/$new_picture");
        $query_appendix = mysqli_query($db, "UPDATE appendix SET file_name='$name',  file='$new_picture', time_uploaded='$date' WHERE id_films = $idFilm");
        if ($query_appendix) {
            header("Location:film.php");
        } else {
            echo "Add Data Failed";
        }
    } else {
        header("Location:film.php");
    }
}

?>

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
    <div class="form_class">
        <h3>Form Edit Film</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Titles</label>
            <input type="text" name="title_film" value="<?= $title ?>" class="form_text"><br><br>

            <label for="">Year</label>
            <input type="number" name="year" value="<?= $year ?>" class="form_text"><br><br>

            <label for="">Genre</label>
            <input type="text" name="genre" value="<?= $genre ?>" class="form_text"><br><br>

            <label for="">Duration</label>
            <input type="text" name="duration" value="<?= $duration ?>" class="form_text"><br><br>

            <label for="">Ratings</label>
            <input type="number" step="any" name="ratings" value="<?= $ratings ?>" class="form_text"><br><br>

            <label for="">Rent</label>
            <input type="number" name="rent" value="<?= $rent ?>" class="form_text"><br><br>

            <label for="">File Name</label><br>
            <input type="text" name="picture_name" class="form_text" value="<?= $file_name ?>"><br><br>

            <label for="picture">Picture/Film Poster</label><br>
            <img src="images/<?= $file ?>" alt="<?= $file ?>" width="150px" height="200px"><br><br>
            <input type="file" name="picture" class="form_text" value="<?= $file ?>"><br><br>

            <input type="hidden" id="id" name="old_picture" value='<?= $file ?>'>

            <input type="submit" name="submit" value="Confirm" class="btn_submit">
        </form>
    </div>
</body>

</html>