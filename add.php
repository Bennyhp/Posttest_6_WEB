<?php
require "config.php";
if (isset($_POST['submit'])) {
    $idFilms = $_POST['film_title'];
    $name = $_POST['renter_name'];
    $email = $_POST['email'];
    $query_renters = mysqli_query($db, "INSERT INTO renters (name,email) VALUES ('$name','$email')");
    $idRenters = mysqli_insert_id($db);
    $query_rented = mysqli_query($db, "INSERT INTO rented (id_films, id_renters) VALUES ('$idFilms', $idRenters)");
    if ($query_renters) {
        header("Location:rented.php");
    } else {
        echo "Add Data Failed";
    }
}
