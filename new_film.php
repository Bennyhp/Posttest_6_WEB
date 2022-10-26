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
        <form action="add_film.php" method="post">
            <label for="">Titles</label>
            <input type="text" name="title_film" class="form_text"><br><br>

            <label for="">Year</label>
            <input type="number" name="year" class="form_text"><br><br>

            <label for="">Genre</label>
            <input type="text" name="genre" class="form_text"><br><br>

            <label for="">Duration</label>
            <input type="text" name="duration" class="form_text"><br><br>

            <label for="">Ratings</label>
            <input type="number" step="any" name="ratings" class="form_text"><br><br>

            <label for="">Rent</label>
            <input type="number" name="rent" class="form_text"><br><br>

            <input type="submit" name="submit" value="Confirm" class="btn_submit">
        </form>
    </div>
</body>
</html>