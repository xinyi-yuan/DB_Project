<!DOCTYPE html>
<head>
    <title>Job Info</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<h1>Job Info</h1>
<?php
// Database credentials
$servername = "localhost";
$username = "root"; // replace with your database username
$password = ""; // replace with your database password
$dbname = "project"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to fetch data from Jobs table
$sql = "SELECT * FROM jobs";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Manager ID</th><th>Job Title</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["ID"]. "</td>
        <td>" . $row["ManagerID"]. "</td>
        <td>" . $row["JobTitle"]. "</td>
        </tr>";
    } 
    echo "</table>"; 
} else {
    echo "<tr><td colspan='7'>No results found</td></tr>";
}

// Start of Job Required Exp table
$sql = "SELECT * FROM JobRequiredExp";
$result = $conn->query($sql);

echo "<h1>Job Required Exp</h2>";

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Job ID</th><th>Type</th><th>Years of Experience</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["ID"]. "</td>
        <td>" . $row["JobID"]. "</td>
        <td>" . $row["Type"]. "</td>
        <td>" . $row["YearsOfExp"]. "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "<tr><td colspan='7'>No results found</td></tr>";
}

// Start of Training Required table
$sql = "SELECT * FROM TrainingRequired";
$result = $conn->query($sql);

echo "<h1>Training Required</h1>";

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Job ID</th><th>Name</th><th>Duration (Days)</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row["ID"]. "</td>
        <td>" . $row["JobID"]. "</td>
        <td>" . $row["Name"]. "</td>
        <td>" . $row["DurationDays"]. "</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "<tr><td colspan='7'>No results found</td></tr>";
}

$conn->close();
?>
</body>
</html>
