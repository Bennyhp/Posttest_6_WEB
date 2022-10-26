<?php
require "config.php";
$idFilms = $_GET['id'];
var_dump($idFilms);
if (isset($_GET['id'])) {
    $query = mysqli_query($db, "DELETE FROM films WHERE id_films = '$idFilms'");
    if($query){
        header("Location:film.php");
    } else {
        echo "Delete Failed";
    }
}
?>