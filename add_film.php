<?php
require "config.php";
if(isset($_POST['submit'])){
    $title = htmlspecialchars($_POST['title_film']);
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $duration = $_POST['duration'];
    $ratings = $_POST['ratings'];
    $rent = $_POST['rent'];
    $query = mysqli_query($db, "INSERT INTO films (title, year, genre, duration, ratings, rent) VALUES ('$title', '$year', '$genre', '$duration', '$ratings', '$rent')");
    if ($query) {
        header("Location:film.php");
    } else {
        echo "Add Data Failed";
    }
}
