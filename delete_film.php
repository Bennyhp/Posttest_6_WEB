<?php
require "config.php";
$idFilms = $_GET['id'];
$query = mysqli_query($db, "SELECT * FROM appendix WHERE id_films = $idFilms");
$result = mysqli_fetch_assoc($query);
$delete_picture = $result['file'];
if (isset($_GET['id'])) {
    $query = mysqli_query($db, "DELETE films, appendix FROM films INNER JOIN appendix ON films.id_films = appendix.id_films WHERE films.id_films = '$_GET[id]'");
    if($query){
        unlink('images/' . $delete_picture);
        header("Location:film.php");
    } else {
        echo "Delete Failed";
    }
}
?>  