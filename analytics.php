<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Staff Analytics</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>📊 Staff Analytics Dashboard</h2>

<!-- 1️⃣ Average Salary -->
<h3>1. Average Salary of All Staff</h3>
<?php
$result = $conn->query("SELECT AVG(salary) AS avg_salary FROM staff");
$row = $result->fetch_assoc();
echo "<p><strong>Average Salary:</strong> $" . number_format($row['avg_salary'], 2) . "</p>";
?>

<!-- 2️⃣ Staff Above Average Salary -->
<h3>2. Staff Earning Above the Average Salary</h3>
<?php
$sql = "SELECT first_name, last_name, salary 
        FROM staff 
        WHERE salary > (SELECT AVG(salary) FROM staff)";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  echo "<table><tr><th>Name</th><th>Salary</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['first_name']} {$row['last_name']}</td><td>\${$row['salary']}</td></tr>";
  }
  echo "</table>";
} else {
  echo "<p>No staff earning above average.</p>";
}
?>

<!-- 3️⃣ Top 3 Highest Paid Staff -->
<h3>3. Top 3 Highest Paid Staff</h3>
<?php
$sql = "SELECT first_name, last_name, salary 
        FROM staff 
        ORDER BY salary DESC 
        LIMIT 3";
$result = $conn->query($sql);
echo "<table><tr><th>Name</th><th>Salary</th></tr>";
while($row = $result->fetch_assoc()) {
  echo "<tr><td>{$row['first_name']} {$row['last_name']}</td><td>\${$row['salary']}</td></tr>";
}
echo "</table>";
?>

<!-- 4️⃣ Average Performance Rating -->
<h3>4. Average Performance Rating</h3>
<?php
$result = $conn->query("SELECT AVG(rating) AS avg_rating FROM performance");
$row = $result->fetch_assoc();
echo "<p><strong>Average Rating:</strong> " . round($row['avg_rating'], 2) . "/10</p>";
?>

</body>
</html>
