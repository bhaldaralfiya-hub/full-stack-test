<?php
require '../config/db.php';

$message = '';

if(isset($_POST['submit'])){

    $category = trim($_POST['category']);
    $label = trim($_POST['label']);
    $title = trim($_POST['title']);
    $button_text = trim($_POST['button_text']);
    $image = trim($_POST['image']);
    $icon = $_POST['icon'];

    if(empty($category) || empty($label) || empty($title) || empty($image)){

        $message = "<div class='alert alert-danger'>All fields are required.</div>";

    } else {

        $stmt = $conn->prepare(
            "INSERT INTO slides(category,label,title,button_text,image,icon)
             VALUES(?,?,?,?,?,?)"
        );

        $stmt->bind_param(
            "ssssss",
            $category,
            $label,
            $title,
            $button_text,
            $image,
            $icon
        );

        if($stmt->execute()){

            header("Location: view-slides.php");
            exit;

        } else {

            $message = "<div class='alert alert-danger'>Something went wrong.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Slide</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header">
            <h3>Add New Slide</h3>

            <p>
    <a href="../index.php">View Frontend</a> |
    <a href="view-slides.php">View All Slides</a>
</p>

        </div>

        <div class="card-body">

            <?= $message; ?>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input type="text"
                           name="category"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Label</label>
                    <input type="text"
                           name="label"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <textarea name="title"
                              class="form-control"
                              rows="4"
                              required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Button Text</label>
                    <input type="text"
                           name="button_text"
                           class="form-control"
                           value="Learn More">
                </div>

                <div class="mb-3">
                    <label class="form-label">Image Filename</label>
                    <input type="text"
                           name="image"
                           class="form-control"
                           placeholder="uploads/image.jpg"
                           required>
                </div>

                Icon File:<br>
<input type="text" name="icon" placeholder="learning.svg"><br><br>

                <button type="submit"
                        name="submit"
                        class="btn btn-primary">
                    Save Slide
                </button>

                <a href="view-slides.php"
                   class="btn btn-secondary">
                    View Slides
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>