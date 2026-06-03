<?php
require '../config/db.php';

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    $stmt = $conn->prepare("DELETE FROM slides WHERE id = ?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()){

        header("Location: view-slides.php");
        exit;

    } else {

        echo "Failed to delete slide.";
    }

} else {

    echo "Invalid Request.";
}
?>