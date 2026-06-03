<?php
require '../config/db.php';

$message = "";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $conn->prepare("SELECT * FROM slides WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 0){
    die("Slide not found");
}

$row = $result->fetch_assoc();

if(isset($_POST['update'])){

    $category = trim($_POST['category']);
    $label = trim($_POST['label']);
    $title = trim($_POST['title']);
    $button_text = trim($_POST['button_text']);
    $image = trim($_POST['image']);
    $icon = trim($_POST['icon']);

    if(empty($category) || empty($label) || empty($title) || empty($image)){

        $message = "<div class='alert alert-danger'>All fields are required.</div>";

    } else {

        $stmt = $conn->prepare(
            "UPDATE slides
             SET category=?,
                 label=?,
                 title=?,
                 button_text=?,
                 image=?,
                 icon=?
             WHERE id=?"
        );

        $stmt->bind_param(
            "ssssssi",
            $category,
            $label,
            $title,
            $button_text,
            $image,
            $icon,
            $id
        );
        if($update->execute()){

            header("Location: view-slides.php");
            exit;

        } else {

            $message = "<div class='alert alert-danger'>Update failed.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Slide</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header">
            <h3>Edit Slide</h3>

        </div>

        <div class="card-body">

            <?= $message; ?>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <input
                        type="text"
                        name="category"
                        class="form-control"
                        value="<?= htmlspecialchars($row['category']); ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Label</label>
                    <input
                        type="text"
                        name="label"
                        class="form-control"
                        value="<?= htmlspecialchars($row['label']); ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <textarea
                        name="title"
                        class="form-control"
                        rows="4"
                        required><?= htmlspecialchars($row['title']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Button Text</label>
                    <input
                        type="text"
                        name="button_text"
                        class="form-control"
                        value="<?= htmlspecialchars($row['button_text']); ?>"
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Image filename</label>
                    <input
                        type="text"
                        name="image"
                        class="form-control"
                        value="<?= htmlspecialchars($row['image']); ?>"
                        required
                    >
                </div>

                <br><br>

Icon File:<br>
<input type="text"
       name="icon"
       value="<?= htmlspecialchars($row['icon']); ?>">

                <button
                    type="submit"
                    name="update"
                    class="btn btn-success">
                    Update Slide
                </button>

                <a
                    href="view-slides.php"
                    class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>