<?php
require "config.php";
if (isset($_POST['submit'])) {
    $title = htmlspecialchars($_POST['title_film']);
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $duration = $_POST['duration'];
    $ratings = $_POST['ratings'];
    $rent = $_POST['rent'];
    $query = mysqli_query($db, "INSERT INTO films (title, year, genre, duration, ratings, rent) VALUES ('$title', '$year', '$genre', '$duration', '$ratings', '$rent')");
    if (!empty($_FILES['picture']['name'])) {
        $query = mysqli_query($db, "SELECT * FROM films WHERE title = '$title'");
        $result = mysqli_fetch_assoc($query);
        $idFilm = $result['id_films'];
        $name = htmlspecialchars($_POST['picture_name']);
        $picture = htmlspecialchars($_FILES['picture']['name']);
        $x = explode(',', $picture);
        $extension = strtolower(end($x));
        $new_picture = "$name.$extension";
        $tmp = $_FILES['picture']['tmp_name'];
        if (move_uploaded_file($tmp, "images/$new_picture")) {
            $query = mysqli_query($db, "INSERT INTO appendix (id_films, file_name, file) VALUES ($idFilm, '$name', '$new_picture')");
            if ($query) {
                header("Location:film.php");
            } else {
                echo "Add Data Failed";
            }
        }
    } else {
        echo "MASUK SINI";
        var_dump($result);
    }
}
