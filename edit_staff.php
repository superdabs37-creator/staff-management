<?php
include('db.php');

// Check if staff ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch existing staff data
    $result = $conn->query("SELECT * FROM staff WHERE staff_id = $id");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Staff not found.";
        exit;
    }
} else {
    echo "No staff ID provided.";
    exit;
}

// Update staff record when form is submitted
if (isset($_POST['update'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $department_id = $_POST['department_id'];
    $salary = $_POST['salary'];
    $hire_date = $_POST['hire_date'];

    $sql = "UPDATE staff 
            SET first_name='$first_name', 
                last_name='$last_name', 
                department_id='$department_id', 
                salary='$salary', 
                hire_date='$hire_date'
            WHERE staff_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Staff updated successfully!');</script>";
        echo "<script>window.location='index.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Staff</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Edit Staff Details</h2>

<form method="post">
  <label>First Name:</label>
  <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required><br>

  <label>Last Name:</label>
  <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required><br>

  <label>Department ID:</label>
  <input type="number" name="department_id" value="<?php echo $row['department_id']; ?>" required><br>

  <label>Salary:</label>
  <input type="number" step="0.01" name="salary" value="<?php echo $row['salary']; ?>" required><br>

  <label>Hire Date:</label>
  <input type="date" name=
