<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Staff</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Add New Staff</h2>

<form method="post">
  <label>First Name:</label>
  <input type="text" name="first_name" required><br>

  <label>Last Name:</label>
  <input type="text" name="last_name" required><br>

  <label>Salary:</label>
  <input type="number" step="0.01" name="salary" required><br>

  <label>Hire Date:</label>
  <input type="date" name="hire_date" required><br>

  <input type="submit" name="submit" value="Add Staff">
</form>

<?php
if (isset($_POST['submit'])) {
  $fn = $_POST['first_name'];
  $ln = $_POST['last_name'];
  $sal = $_POST['salary'];
  $date = $_POST['hire_date'];

  // Use prepared statement for security
  $stmt = $conn->prepare("INSERT INTO staff (first_name, last_name, salary, hire_date)
                          VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssds", $fn, $ln, $sal, $date);

  if ($stmt->execute()) {
    echo "<script>alert('Staff added successfully!'); window.location='index.php';</script>";
  } else {
    echo "<p>Error: " . $stmt->error . "</p>";
  }

  $stmt->close();
}
$conn->close();
?>
</body>
</html>
