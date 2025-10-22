<?php
include('db.php');

// Check if staff ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the staff record
    $sql = "DELETE FROM staff WHERE staff_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Staff deleted successfully!');</script>";
        echo "<script>window.location='index.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No staff ID provided.";
}

$conn->close();
?>
