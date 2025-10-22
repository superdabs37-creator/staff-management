<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Staff Management</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Staff Management</h2>
<a href="add_staff.php" class="btn">Add Staff</a>
<a href="analytics.php" class="btn">View Analytics</a>
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Department</th>
    <th>Salary</th>
    <th>Hire Date</th>
    <th>Actions</th>
  </tr>
  <?php
  $result = $conn->query("SELECT s.*, d.department_name FROM staff s LEFT JOIN department d ON s.department_id = d.department_id");
  while($row = $result->fetch_assoc()) {
    echo "<tr>
      <td>{$row['staff_id']}</td>
      <td>{$row['first_name']} {$row['last_name']}</td>
      <td>{$row['department_name']}</td>
      <td>{$row['salary']}</td>
      <td>{$row['hire_date']}</td>
      <td>
        <a href='edit_staff.php?id={$row['staff_id']}'>Edit</a> |
        <a href='delete_staff.php?id={$row['staff_id']}'>Delete</a>
      </td>
    </tr>";
  }
  ?>
</table>
</body>
</html>
