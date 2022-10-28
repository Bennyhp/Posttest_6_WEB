<?php
require "config.php";
if (isset($_GET['id'])) {
    $idRented = $_GET['id'];
    $query = mysqli_query($db, "SELECT * FROM renters WHERE id_renters=$idRented");
    $result = mysqli_fetch_assoc($query);
    $idRenters = $result['id_renters'];

    $query_rented = mysqli_query($db, "DELETE FROM rented WHERE id_rented=$idRented");
    $query_renters = mysqli_query($db, "DELETE FROM renters WHERE id_renters=$idRenters");
    if ($query_rented) {
        header("Location:rented.php");
    } else {
        echo "Delete Failed";
    }
} 
