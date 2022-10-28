<?php 
require "config.php";

if(isset($_GET['id'])){
    $query = mysqli_query($db, "SELECT * FROM films WHERE id_films = '$_GET[id]'");
    $result = mysqli_fetch_array($query);
    $title = $result['title'];
    $year = $result['year'];
    $genre = $result['genre'];
    $duration = $result['duration'];
    $ratings = $result['ratings'];
    $rent = $result['rent'];
}


if(isset($_POST['submit'])){
    $title_update = htmlspecialchars($_POST['title_film']);
    $query = mysqli_query($db, "UPDATE films SET title = '$title_update', year = '$_POST[year]', genre = '$_POST[genre]', duration = '$_POST[duration]', ratings = '$_POST[ratings]', rent = '$_POST[rent]' WHERE id_films = $_GET[id]");
    if($query){
        header('Location:film.php');
    } else {
        echo "Update Failed";
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
</head>
<body>
    <div class="form_film">
        <h3>Form Film</h3>
        <form action="" method="post">
            <label for="">Titles</label>
            <input type="text" name="title_film" value="<?=$title?>" class="form_text"><br><br>

            <label for="">Year</label>
            <input type="number" name="year" value="<?=$year?>" class="form_text"><br><br>

            <label for="">Genre</label>
            <input type="text" name="genre" value="<?=$genre?>" class="form_text"><br><br>

            <label for="">Duration</label>
            <input type="text" name="duration" value="<?=$duration?>" class="form_text"><br><br>

            <label for="">Ratings</label>
            <input type="number" step="any" name="ratings" value="<?=$ratings?>" class="form_text"><br><br>

            <label for="">Rent</label>
            <input type="number" name="rent" value="<?=$rent?>" class="form_text"><br><br>

            <input type="submit" name="submit" value="Confirm" class="btn_submit">
        </form>
    </div>
</body>
</html>
