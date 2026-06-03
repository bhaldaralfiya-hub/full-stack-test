<?php
require '../config/db.php';

$id = $_GET['id'];

// get existing data
$result = mysqli_query($conn, "SELECT * FROM slides WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Slide</title>
</head>
<body>

<h2>Edit Slide</h2>

<form method="POST">

    Category:<br>
    <input type="text" name="category" value="<?= $row['category'] ?>"><br><br>

    Label:<br>
    <input type="text" name="label" value="<?= $row['label'] ?>"><br><br>

    Title:<br>
    <textarea name="title"><?= $row['title'] ?></textarea><br><br>

    Button Text:<br>
    <input type="text" name="button_text" value="<?= $row['button_text'] ?>"><br><br>

    Image URL:<br>
    <input type="text" name="image" value="<?= $row['image'] ?>"><br><br>

    <button type="submit" name="update">Update</button>

</form>

</body>
</html>