<?php
require '../config/db.php';

$result = mysqli_query($conn, "SELECT * FROM slides ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Slides</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Manage Slides</h2>
<!-- 
        <a href="add-slide.php" class="btn btn-primary">
            Add New Slide
        </a> -->

        <p>
    <a href="../index.php">View Frontend</a> |
    <a href="add-slide.php">Add New Slide</a>
</p> 

    </div>

    <div class="card shadow">

        <div class="card-body">

            <table class="table table-bordered table-striped table-hover">

                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Label</th>
                        <th>Title</th>
                        <th>Button</th>
                        <th>Image</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                $sr = 1;

                while($row = mysqli_fetch_assoc($result)){
                ?>

                    <tr>

                        <td><?= $sr++; ?></td>

                        <td><?= htmlspecialchars($row['category']); ?></td>

                        <td><?= htmlspecialchars($row['label']); ?></td>

                        <td><?= htmlspecialchars($row['title']); ?></td>

                        <td><?= htmlspecialchars($row['button_text']); ?></td>

                        <td>

                            <?php if(!empty($row['image'])) { ?>

                                <img
                                src="../files/images/<?= htmlspecialchars($row['image']); ?>"
                                    width="80"
                                    height="80"
                                    style="object-fit:cover;"
                                >

                            <?php } ?>

                        </td>

                        <td>

                            <a href="edit-slide.php?id=<?= $row['id']; ?>"
                               class="btn btn-warning btn-sm">
                               Edit
                            </a>

                            <a href="delete-slide.php?id=<?= $row['id']; ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Delete this slide?')">
                               Delete
                            </a>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>