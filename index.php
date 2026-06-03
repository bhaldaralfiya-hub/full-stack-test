<?php
require 'config/db.php';

$result = mysqli_query($conn, "SELECT * FROM slides ORDER BY sort_order ASC, id ASC");

$slides = [];

while($row = mysqli_fetch_assoc($result)){
    $slides[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>WPoets Full Stack Test</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
<div style="text-align:center; padding:15px;">

    <a href="admin/add-slide.php">Add Slide</a> |

    <a href="admin/view-slides.php">View Slides</a>

</div>
<section class="action-section">

    <div class="container">

        <div class="heading-area">
            <h1>DelphianLogic in Action</h1>

            <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                Aenean commodo
            </p>
        </div>

        <div class="row g-0 main-box">

            <!-- LEFT TABS -->

          <!-- LEFT TABS -->

<div class="col-lg-3 left-tabs">

    <?php foreach($slides as $index => $slide){ ?>

        <div class="tab-item <?php echo ($index == 0) ? 'active' : ''; ?>"
             data-id="<?php echo $slide['id']; ?>">

            <div class="tab-content">

                <img
                    src="files/images/<?php echo htmlspecialchars($slide['icon']); ?>"
                    class="tab-icon"
                    alt=""
                >

                <span class="tab-title">
                    <?php echo htmlspecialchars($slide['category']); ?>
                </span>

            </div>

        </div>

    <?php } ?>

</div>

            <!-- CENTER CONTENT -->

            <div class="col-lg-4">

                <?php foreach($slides as $index => $slide){ ?>

                    <div class="content-slide"
                         id="content-<?php echo $slide['id']; ?>"
                         <?php if($index != 0){ ?>style="display:none"<?php } ?>>

                        <div class="content-box">

                            <span class="label">
                                <?php echo htmlspecialchars($slide['label']); ?>
                            </span>

                            <h2>
                                <?php echo htmlspecialchars($slide['title']); ?>
                            </h2>

                            <a href="#" class="learn-btn">
                                <?php echo htmlspecialchars($slide['button_text']); ?>
                            </a>

                        </div>

                    </div>

                <?php } ?>

            </div>

            <!-- RIGHT IMAGE -->

            <div class="col-lg-5">

                <?php foreach($slides as $index => $slide){ ?>

                    <div class="image-slide"
                         id="image-<?php echo $slide['id']; ?>"
                         <?php if($index != 0){ ?>style="display:none"<?php } ?>>

                        <img
                            src="files/images/<?php echo htmlspecialchars($slide['image']); ?>"
                            alt=""
                            class="img-fluid main-image"
                        >

                    </div>

                <?php } ?>

            </div>

                </div>

        <!-- MOBILE VERSION START -->

        <div class="mobile-version">

            <?php foreach($slides as $index => $slide){ ?>

                <div class="mobile-slide">

                    <div class="mobile-header <?php echo ($index == 0) ? 'active' : ''; ?>"
                         data-id="<?php echo $slide['id']; ?>">

                        <img
                            src="files/images/<?php echo htmlspecialchars($slide['icon']); ?>"
                            class="mobile-icon"
                            alt=""
                        >

                        <span>
                            <?php echo htmlspecialchars($slide['category']); ?>
                        </span>

                        <img
                            src="files/images/<?php echo ($index == 0) ? 'minus-01.svg' : 'plus-01.svg'; ?>"
                            class="mobile-toggle"
                            alt=""
                        >

                    </div>

                    <div class="mobile-content"
                         id="mobile-content-<?php echo $slide['id']; ?>"
                         <?php if($index != 0){ ?>style="display:none"<?php } ?>>

                        <img
                            src="files/images/<?php echo htmlspecialchars($slide['image']); ?>"
                            class="mobile-bg"
                            alt=""
                        >

                        <div class="mobile-overlay">

                            <span class="mobile-label">
                                <?php echo htmlspecialchars($slide['label']); ?>
                            </span>

                            <h2>
                                <?php echo htmlspecialchars($slide['title']); ?>
                            </h2>

                            <a href="#">
                                <?php echo htmlspecialchars($slide['button_text']); ?>
                            </a>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

        <!-- MOBILE VERSION END -->

    </div>

</section>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="assets/js/script.js"></script>

</body>
</html>