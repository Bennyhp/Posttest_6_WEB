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
        <h3>Form Film</h3>
        <form action="add_film.php" method="post" enctype="multipart/form-data">
            <label for="">Titles</label><br>
            <input type="text" name="title_film" class="form_text"><br><br>

            <label for="">Year</label><br>
            <input type="number" name="year" class="form_text"><br><br>

            <label for="">Genre</label><br>
            <input type="text" name="genre" class="form_text"><br><br>

            <label for="">Duration</label><br>
            <input type="text" name="duration" class="form_text"><br><br>

            <label for="">Ratings</label><br>
            <input type="number" step="any" name="ratings" class="form_text"><br><br>

            <label for="">Rent</label><br>
            <input type="number" name="rent" class="form_text"><br><br>

            <label for="picture_name">File Name</label><br>
            <input type="text" name="picture_name" class="form_text"><br><br>

            <label for="picture">Picture/Film Poster</label><br>
            <input type="file" name="picture" class="form_text"><br><br>

            <input type="submit" name="submit" value="Confirm" class="btn_submit">
        </form>
    </div>
</body>

</html>