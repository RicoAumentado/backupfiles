<?php
include 'connect.php';

if (isset($_GET['deleteid'])) {
    $id = intval($_GET['deleteid']); // Validate ID to prevent SQL injection

    $sql = "DELETE FROM `seriescrud` WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: read.php"); // Redirect after successful deletion
    } else {
        die("Error deleting record: " . mysqli_error($conn));
    }
} else {
    die("Invalid request. No ID provided.");
}
?>
